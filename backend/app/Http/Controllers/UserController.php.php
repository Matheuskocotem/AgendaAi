<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Listar todos os usuários (somente admin)
    public function index()
    {
        return response()->json($this->userService->listUsers(), 200);
    }

    // Criar um novo usuário
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $data['password'] = bcrypt($data['password']);
        return response()->json($this->userService->createUser($data), 201);
    }

    // Atualizar um usuário
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6|confirmed',
        ]);
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return response()->json($this->userService->updateUser($id, $data), 200);
    }

    // Deletar um usuário (somente admin)
    public function destroy($id)
    {
        return response()->json($this->userService->deleteUser($id), 204);
    }

    // Definir papel de usuário (somente admin)
    public function assignRole(Request $request, $id)
    {
        $role = $request->validate([
            'role' => 'required|in:admin,user',
        ]);
        return response()->json($this->userService->assignRole($id, $role['role']), 200);
    }
}
