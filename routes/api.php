<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('users/{name?}' , function($name = null){
    return 'Hi ' . $name ;
})->where('name' , '[a-zA-z]+');
