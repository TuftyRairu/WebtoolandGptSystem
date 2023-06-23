<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    echo "<center><h1>Nothing to see here.</h1></center>";
    return $router->app->version();
});

Route::group([

    'prefix' => 'api'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@me');
    Route::post('register', 'UserController@register');
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@user');
});

$router->group(['prefix' => 'api'], function($router) {
    $router->post('/payment', 'PaymentController@pay');
    $router->post('/urlencode', 'WebtoolsController@urlencode');
    $router->post('/urldecode', 'WebtoolsController@urldecode');
    $router->post('/base64encode', 'WebtoolsController@baseencode');
    $router->post('/base64decode', 'WebtoolsController@basedecode');
    $router->post('/htmllinkgenerator', 'WebtoolsController@linkgenerator');
    $router->post('/chat', 'GPTController@chat');
});
