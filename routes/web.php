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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

// Authentication
$router->get('/getuser','UserController@getuser');
$router->post('/register','UserController@register');
$router->post('/login','UserController@login');

// Post
$router->get('/post','PostController@getall');
$router->get('/post/{id}','PostController@getbyid');
$router->post('/createpost','PostController@create');
$router->put('/updatepost/{id}','PostController@update');
$router->delete('/deletepost/{id}','PostController@destroy');

// Category
$router->get('/category','CategoryController@getall');
$router->get('/category/{id}','CategoryController@getbyid');
$router->post('/createcategory','CategoryController@create');
$router->put('/updatecategory/{id}','CategoryController@update');
$router->delete('/deletecategory/{id}','CategoryController@destroy');

// Tag
$router->get('/tag','TagController@getall');
$router->get('/tag/{id}','TagController@getbyid');
$router->post('/createtag','TagController@create');
$router->put('/updatetag/{id}','TagController@update');
$router->delete('/deletetag/{id}','TagController@destroy');

// Blog
$router->get('/blog','BlogController@getall');
$router->get('/blog/{id}','BlogController@getbyid');
$router->post('/createblog','BlogController@create');
$router->put('/updateblog/{id}','BlogController@update');
$router->delete('/deleteblog/{id}','BlogController@destroy');