<?php
namespace App\Listeners;

interface SocialAuthenticateInterface
{
    public function SocialUserHasLoggedIn($user);
}

