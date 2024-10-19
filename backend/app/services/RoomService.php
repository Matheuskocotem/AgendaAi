<?php 

namespace App\Services;

use App\Repositories\RoomRepository;

class RoomService
{
    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    // Listar todas as salas
    public function listRooms()
    {
        return $this->roomRepository->all();
    }

    // Criar uma nova sala
    public function createRoom(array $data)
    {
        return $this->roomRepository->create($data);
    }

    // Atualizar uma sala
    public function updateRoom($id, array $data)
    {
        $room = $this->roomRepository->find($id);
        if ($room) {
            return $this->roomRepository->update($room, $data);
        }
        return null; 
    }

    // Deletar uma sala
    public function deleteRoom($id)
    {
        $room = $this->roomRepository->find($id);
        if ($room) {
            return $this->roomRepository->delete($room);
        }
        return null; 
    }
}
