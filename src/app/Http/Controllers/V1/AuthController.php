<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RegisterUserRequest;
use App\Services\AuthServices;

class AuthController extends Controller
{
    public function __construct(
        private AuthServices $authService
    ) {}

    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $user = $this->authService->registerUser($validated);

        if (!$user)
            return response()->json(['message' => 'Erro ao criar usuário'], 500);

        return response()->json([
            'message' => 'Usuário criado com sucesso'
        ], 201);
    }
}
