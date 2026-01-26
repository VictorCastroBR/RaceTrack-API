<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AuthServices
{
    public function registerUser(array $data): User
    {
        $data = Arr::except($data, ['password_confirmation']);
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}
