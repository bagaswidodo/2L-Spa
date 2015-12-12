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

$prefix = 'api/v1';
$namespace = 'App\Http\Controllers';

// $app->post('auth', 'UserController@checkAuth');
$app->group(['namespace' => $namespace] , function($app){
	$app->post('auth', ['uses' => 'UserController@checkAuth', 'as' => 'authUser']);
});

// API for faskes
// done, tinggal debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes',      ['uses' => 'FaskesController@all', 'as' => 'allFaskes']);
    $app->get('/faskes/{id}', ['uses' => 'FaskesController@show', 'as' => 'singleFaskes']);
    $app->post('/faskes',     ['uses' => 'FaskesController@store', 'as' => 'saveFaskes']);
    $app->put('/faskes/{id}', ['uses' => 'FaskesController@update', 'as' => 'updateFaskes']);
    $app->delete('/faskes/{id}', ['uses' => 'FaskesController@destroy', 'as' => 'deleteFaskes']);
});


//API for faskes open
// done, tinggal debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
   $app->get('/faskes/{id}/open', ['uses' => 'FaskesOpenController@all', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/open', ['uses' => 'FaskesOpenController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{id}/open/{hari}', ['uses' => 'FaskesOpenController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/open/{hari}', ['uses' => 'FaskesOpenController@destroy', 'as' => 'deleteFaskesOpen']);
});

//API for dokter faskes
//done, debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes/{id}/dokter', ['uses' => 'FaskesDokterController@show', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/dokter', ['uses' => 'FaskesDokterController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{id}/dokter/{dokter}', ['uses' => 'FaskesDokterController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/dokter/{dokter}', ['uses' => 'FaskesDokterController@destroy', 'as' => 'deleteFaskesOpen']);
});

//API for jadwal praktek dokter
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes/{id}/dokter/{dokter}/praktek', 
        ['uses' => 'PraktekDokterFaskesController@show', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/dokter/{dokter}/praktek', 
        ['uses' => 'PraktekDokterFaskesController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{faskes}/dokter/{dokter}/praktek/{hari}', 
        ['uses' => 'PraktekDokterFaskesController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/dokter/{dokter}/praktek/{hari}', 
        ['uses' => 'PraktekDokterFaskesController@destroy', 'as' => 'deleteFaskesOpen']);
});

// API for vote
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/reviews', ['uses' => 'ReviewController@getAllFaskes', 'as' => 'allReview']);
    $app->get('/review/{id}', ['uses' => 'ReviewController@getFaskes', 'as' => 'singleReview']);
    $app->post('/review', ['uses' => 'ReviewController@saveFaskes', 'as' => 'saveReview']);
    $app->put('/review/{id}', ['uses' => 'ReviewController@updateFaskes', 'as' => 'updateReview']);
    $app->delete('/review/{id}', ['uses' => 'ReviewController@deleteFaskes', 'as' => 'deleteReview']);
});

// $app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
//     $app->get('/users', ['uses' => 'UserController@getAllUsers', 'as' => 'allUsers']);
//     $app->get('/user/{id}', ['uses' => 'UserController@getUser', 'as' => 'singleUser']);
//     $app->post('/user', ['uses' => 'UserController@saveUser', 'as' => 'saveUser']);
//     $app->put('/user/{id}', ['uses' => 'UserController@updateUser', 'as' => 'updateUser']);
//     $app->delete('/user/{id}', ['uses' => 'UserController@deleteUser', 'as' => 'deleteUser']);
// });


