<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function store($input)
    {
        $newUser = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'picture' => env('AVATAR_GENERATOR_URL') . $input['name'],
        ]);
        return $newUser;
    }
}
