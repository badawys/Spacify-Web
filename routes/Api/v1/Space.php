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
    'namespace' => 'Space',
    'prefix' => 'space',
    'middleware' => 'auth:api'],
    function ($api) {

    /**
     * Space routes
     */

    $api->get('/{id}/{args?}', 'SpaceController@getSpace');
    $api->get('/my', 'SpaceController@getUserSpaces');
    $api->get('/joined', 'SpaceController@getJoinedSpaces');
    $api->post('/create', 'SpaceController@createSpace');
    $api->patch('/update/{id}', 'SpaceController@updateSpace');
    $api->delete('/update/{id}', 'SpaceController@deleteSpace');

});

