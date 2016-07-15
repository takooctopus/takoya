<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info',function(){
    echo "info";
    $user = Auth::user();
    dump($user);
    echo Auth::check();
    //Auth::logout();
    //echo Auth::check()+0;
});

$s = 'social';
Route::get('social/{provider}',['as' => $s , 'uses' => 'Auth\SocialLoginController@login']);


Route::get('login','AuthController@login');


$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);


$m = 'maps.';
Route::get('/maps/googlemap',['as'=>$m . 'googlemap',  'uses'=>'MapController@showGoogleMap']);

Route::get('/checkauth','UserController@checkAuth');
