<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

/**
 * v1 routes
 */


$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1', 'middleware' => ['api']], function ($api) {

    $api->get('/firebase/auth', ['middleware' => ['auth:api'], function (Request $request) {

        $now_seconds = time();
        $payload = [
            "iss" => env('FIREBASE_CLIENT_EMAIL'),
            "sub" => env('FIREBASE_CLIENT_EMAIL'),
            "aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
            "iat" => $now_seconds,
            "exp" => $now_seconds+(60*60),
            "uid" => $request->user()->id,
        ];

        return \Firebase\JWT\JWT::encode($payload, env('FIREBASE_PRIVATE_KEY'));
    }]);

    // example of protected route
    $api->get('/protected', ['middleware' => ['auth:api'], function (Request $request) {
        return $request->user();
    }]);

    // example of free route
    $api->get('/free', function() {
        return "Free";
    });

    /**
     * Api Routes
     * Namespaces indicate folder structure
     */

    require(__DIR__ . '/Api/v1/User.php');

});
