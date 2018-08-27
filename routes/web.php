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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

// $router->group(['prefix' => 'api/v1'], function () use ($router) {
// 	$router->get('/users', 'UserController@index');
// 	$router->post('/user', 'UserController@create');
// 	$router->get('/user/{id}', 'UserController@show');
// 	$router->put('/user/{id}', 'UserController@update');
// 	$router->delete('/user/{id}', 'UserController@destroy');

// 	$router->get('/recipes', 'RecipeController@index');
// 	$router->post('/recipe', 'RecipeController@create');
// 	$router->get('/recipe/{id}', 'RecipeController@show');
// 	$router->put('/recipe/{id}', 'RecipeController@update');
// 	$router->delete('/recipe/{id}', 'RecipeController@destroy');
// });

$router->group(
    [
        'middleware' => 'jwt.auth',
        'prefix' => 'api/v1'
    ],
    function () use ($router) {
        $router->get('/users', 'UserController@index');
        $router->post('/user', 'UserController@create');
        $router->get('/user/{id}', 'UserController@show');
        $router->put('/user/{id}', 'UserController@update');
        $router->delete('/user/{id}', 'UserController@destroy');

        $router->get('/recipes', 'RecipeController@index');
        $router->post('/recipe', 'RecipeController@create');
        $router->get('/recipe/{id}', 'RecipeController@show');
        $router->put('/recipe/{id}', 'RecipeController@update');
        $router->delete('/recipe/{id}', 'RecipeController@destroy');
    }
);

$router->group(
    [
//        'middleware' => 'cors',
        'prefix' => 'api/v1'
    ],
    function () use ($router) {
        // Login
        $router->post('auth/login', 'AuthController@authenticate');
    }
);

