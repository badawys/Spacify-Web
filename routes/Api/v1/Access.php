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
	 * User routes
	 */

	// Signup Route
	$api->post('/register', 'UserController@register');
	// Logout Route
	$api->get('/logout', 'UserController@logout')->middleware('auth:api');


});

