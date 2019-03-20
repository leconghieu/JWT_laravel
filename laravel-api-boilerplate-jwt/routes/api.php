<?php

use Dingo\Api\Routing\Router;
$api = app(Router::class);
$api->version('v1', function(Router $api){
    $api->group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers'], function(Router $api){
//        $api->get('signUp', function(){
//            return view('signUp');
//        });
        $api->post('handlingSignUp', ['as' => 'handlingSignUp', 'uses' => 'UserController@checkSignUp']);
//        $api->get('login', function(){
//            return view('loginForm');
//        });
        $api->post('checkLogin', ['as' => 'checkLogin', 'uses' => 'UserController@checkLogin']);
    });
});