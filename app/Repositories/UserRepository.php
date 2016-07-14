<?php
namespace App\Repositories;

use App\User;

class UserRepository{

    public function findByUsernameOrCreate($userData)
    {
        return User::firstOrCreate([
            'name' => $userData->name,
            'email' =>$userData->email,
            'avatar' => $userData->avatar
        ]);
    }
}