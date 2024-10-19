<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    protected $model;

    public function __construct(Room $room)
    {
        $this->model = $room;
    }

    // Listar todas as salas
    public function all()
    {
        return $this->model->all();
    }

    // Encontrar uma sala pelo ID
    public function find($id)
    {
        return $this->model->find($id);
    }

    // Criar uma nova sala
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Atualizar uma sala
    public function update(Room $room, array $data)
    {
        return $room->update($data);
    }

    // Deletar uma sala
    public function delete(Room $room)
    {
        return $room->delete();
    }
}
