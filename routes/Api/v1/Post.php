<?php


$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| Space Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Space routes.
|
*/

$api->group([
    'namespace' => 'Post',
    'prefix' => 'post',
    'middleware' => 'auth:api'],
    function ($api) {
        /**
         * Space routes
         */

        $api->post('/create', 'PostController@createPost');
        $api->delete('/delete/{id}', 'PostController@deletePost');
        $api->get('/{id}', 'PostController@getPost');
    }
);

