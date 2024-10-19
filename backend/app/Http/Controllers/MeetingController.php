<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MeetingController extends Controller
{
    // Listar todas as reuniões
    public function index()
    {
        $meetings = Meeting::with('user', 'meetingRoom')->get();
        return response()->json($meetings);
    }

    // Criar uma nova reunião
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);

        if ($this->isOutsideWorkHours($startTime)) {
            return response()->json(['error' => true, 'message' => 'Não é possível agendar reuniões fora do horário de trabalho.'], 400);
        }

        if ($this->hasTimeConflict($request->room_id, $startTime, $endTime)) {
            return response()->json(['error' => true, 'message' => 'Conflito de horário com outra reunião.'], 400);
        }

        $meeting = Meeting::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        return response()->json($meeting, 201);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:meeting_rooms,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
    }

    private function isOutsideWorkHours(Carbon $startTime)
    {
        return $startTime->format('H:i') < '08:00' || 
               ($startTime->format('H:i') >= '11:30' && $startTime->format('H:i') < '13:00') || 
               $startTime->format('H:i') >= '17:00';
    }

    private function hasTimeConflict($meetingRoomId, Carbon $startTime, Carbon $endTime)
    {
        return Meeting::where('room_id', $meetingRoomId)
                      ->where(function ($query) use ($startTime, $endTime) {
                          $query->whereBetween('start_time', [$startTime, $endTime])
                                ->orWhereBetween('end_time', [$startTime, $endTime])
                                ->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '<=', $startTime)
                                          ->where('end_time', '>=', $endTime);
                                });
                      })
                      ->exists();
    }

    // Mostrar uma reunião específica
    public function show($id)
    {
        $meeting = Meeting::with('user', 'meetingRoom')->findOrFail($id);
        return response()->json($meeting);
    }

    // Atualizar uma reunião específica
    public function update(Request $request, $id)
    {
        $meeting = Meeting::findOrFail($id);

        $this->authorize('update', $meeting);

        $request->validate([
            'room_id' => 'sometimes|required|exists:meeting_rooms,id',
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after:start_time',
        ]);

        $meeting->update($request->all());
        return response()->json($meeting);
    }

    // Deletar uma reunião específica
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        
        $this->authorize('delete', $meeting);

        $meeting->delete();
        return response()->json(['message' => 'Reunião deletada com sucesso!']);
    }
}
