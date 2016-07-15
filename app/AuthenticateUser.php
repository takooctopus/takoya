<?php
namespace App;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard as Authenticator;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Authenticator
     */
    private $auth;

    /**
     * AuthenticateUser constructor.
     * @param UserRepository $users
     * @param Socialite $socialite
     * @param Authenticator $auth
     */
    public function __construct(UserRepository $users, Socialite $socialite, Authenticator $auth)
    {

        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * @return Authenticator
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param Authenticator $auth
     * @return AuthenticateUser
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return UserRepository
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param UserRepository $users
     * @return AuthenticateUser
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return Socialite
     */
    public function getSocialite()
    {
        return $this->socialite;
    }

    /**
     * @param Socialite $socialite
     * @return AuthenticateUser
     */
    public function setSocialite($socialite)
    {
        $this->socialite = $socialite;
        return $this;
    }

    /**
     * @param $hasCode
     * @return mixed
     */
    public function execute($hasCode,AuthenticateUserListener $listener)
    {
        if(! $hasCode) return $this->getAuthorizationFirst();

        $user = $this->users->findByUsernameOrCreate($this->getgoogleUser());

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);

    }


    private function getAuthorizationFirst()
    {
        return $this->socialite->driver('google')->redirect();
    }

    private function getgoogleUser()
    {
        return $this->socialite->driver('google')->user();
    }
}
