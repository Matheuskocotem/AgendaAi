<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Listar todos os usuários
    public function listUsers()
    {
        return $this->userRepository->all();
    }

    // Criar um novo usuário
    public function createUser(array $data)
    {
        // Garantir que o novo usuário tenha a role de 'user' por padrão
        $data['role'] = $data['role'] ?? 'user'; 
        return $this->userRepository->create($data);
    }

    // Atualizar um usuário
    public function updateUser($id, array $data)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            return $this->userRepository->update($user, $data);
        }
        return null;
    }

    // Deletar um usuário
    public function deleteUser($id)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            return $this->userRepository->delete($user);
        }
        return null;
    }

    // Definir papel do usuário
    public function assignRole($id, $role)
    {
        $user = $this->userRepository->find($id);
        if ($user && in_array($role, ['admin', 'user'])) {
            return $this->userRepository->update($user, ['role' => $role]);
        }
        return null;
    }
}
