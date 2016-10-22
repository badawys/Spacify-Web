<?php


$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| Access Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Access routes.
|
*/

$api->group(['namespace' => 'Access'], function ($api) {

	/**
	 * Signup routes
	 */
	$api->post('/register', 'UserController@register');
});

