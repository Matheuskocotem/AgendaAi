<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;

class MeetingRoomController extends Controller
{
    public function index() 
    {
        $roons = MeetingRoomController::all();
        return response()->json($roons);
    }

    // Criar uma nova sala
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'localizacao' => 'required|string',
            'capacidade' => 'required|integer',
        ]);

        $room = MeetingRoom::create($request->all());
        return response()->json($room, 201);
    }

    // Mostrar uma sala específica
    public function show($id)
    {
        $room = MeetingRoom::findOrFail($id);
        return response()->json($room);
    }

    // Atualizar uma sala específica
    public function update(Request $request, $id)
    {
        $room = MeetingRoom::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string',
            'localizacao' => 'sometimes|required|string',
            'capacidade' => 'sometimes|required|integer',
        ]);

        $room->update($request->all());
        return response()->json($room);
    }

    // Deletar uma sala específica
    public function destroy($id)
    {
        $room = MeetingRoom::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Sala de reunião deletada com sucesso!']);
    }
}
