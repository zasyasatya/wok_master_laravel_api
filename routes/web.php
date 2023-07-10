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

$router->get('/masakan', 'MasakanController@read');
$router->get('/masakan/{id}', 'MasakanController@detail');
$router->post('/masakan/create', 'MasakanController@create');
$router->post('/masakan/update/{id}', 'MasakanController@update');
$router->delete('/masakan/delete/{id}', 'MasakanController@delete');


$router->get('/', function () use ($router) {
    return $router->app->version();
});
