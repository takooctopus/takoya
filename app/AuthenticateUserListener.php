<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/14
 * Time: 15:09
 */
namespace App;

interface AuthenticateUserListener
{
    public function userHasLoggedIn($user);
}