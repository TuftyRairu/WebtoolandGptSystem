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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function($router) {
    $router->post('urldecode', 'WebToolsController@urldecode');
    $router->post('urlencode', 'WebToolsController@urlencode');
    $router->post('base64decode', 'WebToolsController@basedecode');
    $router->post('base64encode', 'WebToolsController@baseencode');
    $router->post('htmllinkgenerator', 'WebToolsController@linkgenerator');
});