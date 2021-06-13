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

$router->group(['middleware' => 'client.credentials'],function() use ($router){

    //Routes for site1 users
    $router->get('/books', 'BooksController@index'); // get all books records
    $router->post('/books', 'BooksController@add'); // create new user records
    $router->get('/books/{id}', 'BooksController@show'); // get user by id
    $router->put('/books/{id}', 'BooksController@update'); // update user records
    $router->patch('/books/{id}', 'BooksController@update'); // update user records
    $router->delete('/books/{id}', 'BooksController@delete'); // delete records

    //Routes for site2 users
    $router->get('/authors', 'AuthorsController@index'); // get all authors records
    $router->post('/authors', 'AuthorsController@add'); // create new Authors records
    $router->get('/authors/{id}', 'AuthorsController@show'); // get Authors by id
    $router->put('/authors/{id}', 'AuthorsController@update'); // update Authors records
    $router->patch('/authors/{id}', 'AuthorsController@update'); // update Authors records
    $router->delete('/authors/{id}', 'AuthorsController@delete'); // delete records
    
});