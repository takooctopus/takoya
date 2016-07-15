<?php

namespace App\Repositories;

use App\Listeners\SocialAuthenticateInterface;
use App\Repositories\SocialUserRepository;
use Illuminate\Contracts\Auth\Guard as Authenticator;
use Laravel\Socialite\Contracts\Factory as Socialite;

class SocialAuthenticateRepository
{
    /**
     * @var SocialUserRepository
     */
    private $socialUsers;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Authenticator
     */
    private $auth; 

    /**
     * SocialAuthenticateRepository constructor.
     * @param SocialUserRepository $socialUsers
     * @param Socialite $socialite
     * @param Authenticator $auth
     */
    public function __construct(SocialUserRepository $socialUsers, Socialite $socialite, Authenticator $auth)
    {

        $this->socialUsers = $socialUsers;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * @param $hasCode
     * @param SocialAuthenticateInterface $listener
     * @param $provider
     * @return mixed
     */
    public function execute($hasCode, SocialAuthenticateInterface $listener, $provider)
    {

        if(!$hasCode) return $this->getSocialAuthorizationFirst($provider);

        $user = $this->socialUsers->findByUsernameOrCreate($this->getSocialUser($provider),$provider);
        

        $this->auth->login($user,true);

        return $listener->SocialUserHasLoggedIn($user);

    }

    /**
     * @param $provider
     * @return mixed
     */
    private function getSocialAuthorizationFirst($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return mixed
     */
    private function getSocialUser($provider)
    {
        return $this->socialite->driver($provider)->user();
    }

}