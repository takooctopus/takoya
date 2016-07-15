<?php
namespace App\Repositories;

use App\User;

class SocialUserRepository
{
    public function findByUsernameOrCreate($userData,$provider)
    {
        return User::firstOrCreate([
            'name' => $userData->name,
            'email'=> $userData->email,
            'avatar' => $userData->avatar,
            'provider' => $provider
        ]);
    }
}