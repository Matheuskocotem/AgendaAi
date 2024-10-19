<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    // Listar todos os usuários
    public function all()
    {
        return $this->model->all();
    }

    // Encontrar um usuário pelo ID
    public function find($id)
    {
        return $this->model->find($id);
    }

    // Criar um novo usuário
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Atualizar um usuário
    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    // Deletar um usuário
    public function delete(User $user)
    {
        return $user->delete();
    }
}
