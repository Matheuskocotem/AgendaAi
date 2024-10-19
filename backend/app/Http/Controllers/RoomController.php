<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        return response()->json($this->roomService->listRooms(), 200);
    }

    public function store(RoomRequest $request)
    {
        return response()->json($this->roomService->createRoom($request->validated()), 201);
    }

    public function show($id)
    {
        $room = $this->roomService->findRoom($id);
        if ($room) {
            return response()->json($room, 200);
        }
        return response()->json(['error' => 'Sala não encontrada'], 404);
    }

    public function update(RoomRequest $request, $id)
    {
        $updatedRoom = $this->roomService->updateRoom($id, $request->validated());
        if ($updatedRoom) {
            return response()->json($updatedRoom, 200);
        }
        return response()->json(['error' => 'Sala não encontrada'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->roomService->deleteRoom($id);
        if ($deleted) {
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Sala não encontrada'], 404);
    }
}
