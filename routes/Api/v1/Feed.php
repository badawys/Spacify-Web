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
    'namespace' => 'Feed',
    'prefix' => 'feed',
    'middleware' => 'auth:api'],
    function ($api) {
        /**
         * Space routes
         */
        $api->get('/', 'FeedController@getFeed');
    }
);