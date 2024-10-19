<?php 

namespace App\Repositories;

use App\Models\Meeting;

class MeetingRepository
{
    protected $model;

    public function __construct(Meeting $meeting)
    {
        $this->model = $meeting;
    }

    // Listar todas as reuniões
    public function all()
    {
        return $this->model->with(['user', 'room'])->get();
    }

    // Encontrar uma reunião pelo ID
    public function find($id)
    {
        return $this->model->find($id);
    }

    // Criar uma nova reunião
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Atualizar uma reunião
    public function update(Meeting $meeting, array $data)
    {
        return $meeting->update($data);
    }

    // Deletar uma reunião
    public function delete(Meeting $meeting)
    {
        return $meeting->delete();
    }
}
