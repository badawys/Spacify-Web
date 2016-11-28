<?php

$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| Access Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Space routes.
|
*/

$api->group(['namespace' => 'Space', 'middleware' => ['auth:api']], function ($api) {

    /**
     * Space routes
     */
    $api->post('/space','SpaceController@createSpace');
});
