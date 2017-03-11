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

    $api->get('/nearby/{lag}/{lat}', 'SpaceController@findNearby');
    $api->get('/my', 'SpaceController@getUserSpaces');
    $api->get('/joined', 'SpaceController@getJoinedSpaces');
    $api->post('/create', 'SpaceController@createSpace');
    $api->patch('/update', 'SpaceController@updateSpace');
    $api->delete('/delete/{id}', 'SpaceController@deleteSpace');
    $api->get('/{id}', 'SpaceController@getSpace');

});

