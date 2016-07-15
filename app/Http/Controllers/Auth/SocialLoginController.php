<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticateUser;
use App\Listeners\SocialAuthenticateInterface;
use App\Repositories\SocialAuthenticateRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialLoginController
 * @package App\Http\Controllers\Auth
 */
class SocialLoginController extends Controller implements SocialAuthenticateInterface
{
    /**
     * @return mixed
     */
    public function login(SocialAuthenticateRepository $socialUser, Request $request,$provider)
    {
        return $socialUser->execute($request->has('code'), $this , $provider);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function socialUserHasLoggedIn($user)
    {
        return redirect('/info');
    }

}
