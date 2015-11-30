<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $app->get('/', function () use ($app) {
//     return $app->welcome();
// });

$app->get('/', function () use ($app) {
    return view('master');
});


$namespace = 'App\Http\Controllers';

// $app->post('auth', 'UserController@checkAuth');
$app->group(['namespace' => $namespace] , function($app){
	$app->post('auth', ['uses' => 'UserController@checkAuth', 'as' => 'authUser']);
});


// $app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
//     $app->get('/users', ['uses' => 'UserController@getAllUsers', 'as' => 'allUsers']);
//     $app->get('/user/{id}', ['uses' => 'UserController@getUser', 'as' => 'singleUser']);
//     $app->post('/user', ['uses' => 'UserController@saveUser', 'as' => 'saveUser']);
//     $app->put('/user/{id}', ['uses' => 'UserController@updateUser', 'as' => 'updateUser']);
//     $app->delete('/user/{id}', ['uses' => 'UserController@deleteUser', 'as' => 'deleteUser']);
// });


