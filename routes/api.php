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

        $secret = "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC/SdtnxsOmGirw\nuepEWv2vzGV/NBk1BhlZi9heCX+CE8bjQJ9C9OzbFmGdg6ybhnzdinQxET+nBbwt\nj37BREDGdKBoggd9I4V9H6GBMg0+IaW5Nz6DLLYlbTuvYJjJC8j3KLjhQK1hArRs\n7fHEi1GbdyCTk41ihRe+JSpIQMATlAm0XZl32kODsQUvhtlNc/Ou+yy9Lx0XKuUZ\n0yDZ6ZjsfmMFL3CaevweSFGU9RiuHC+6ASTeGJ6I5GpapgzR2ALinhcAEKP4FjU2\nXkyHYI15PlM2F+rAHEhx34/HonppApgNZ55Xx5kja8M/OjqZ8rlOcwblx1q9QTGm\nK5OYV0QLAgMBAAECggEAaZ6EMMbE3H/yWbytp1R+YoT/Pb8sc+SMNq9KppGj/9Sf\nqnbR+Qx3g3jWKTy9H5qgc0qxYS5e8P/vqVBj8p6XDXzz3QB+1g+48x9183oJadb2\nRFBGifM0F3I61FkHw2poal/nxSgLE1eE++hd5+HtC2Q5boK4PD+0nl6y+/YUmDnd\nefkAevk0G9y5RgONlvQ+ojytB3lE17EZJlXdQIckEm1XiPsszPdDBphqsNaVTfxw\n5Rm3HPmKYGJV0gTBJ2IZ01aHKn31v61pKdTgv3+OjU1rZITnmJ+o5rTjgtzcG6sQ\nX8TpsCXaT4idyGKakrJ1gUEC85shSoksUM6eBO1z4QKBgQD1c7IlrPR2US8tDNs6\neVNUzPL3n/NVkqsEr4RImjxvABMX4cV6CroD2/xoqZk14pEEzaleRFphfklTCT89\n2egfRPzFSHO+GBDnH8pLzYARQX4J7Lq6os4DoVA54N0CeU2uZzdGgwlnmy9A5DLj\nEY+a+oIr2jEOHROCl+u92YrZ2QKBgQDHgko7AygjnNFassJYwjOgNaTix4e6xs1+\nI7X7BkVKdJSJ2E4tAaAdldnb3XD7MsNj2S4/Icvh/gzu9lHUyGa7sN7WBLe1dZjU\n+iNbi+67qAZKi9k/IUlyg4T6E09mwW5HraaFNsHTmbt1vduHi7DWkMrkYRqStWm6\nBXhls5/agwKBgEFv1s60jXf9rNYV11x/e/ffq+bYfccSkwVsxZeVhwcQvgZf6oXe\n1jixLVm53V7ASGk/ayf2kSHsyR+aF4Il1fyAJ+NwrWrAf8EeeJA8+SegjjmXIzEe\ntk3Bc+H6UPGX5V3ZpqLlzFwSw0ZJkEd5Jw/qOUn3oZxhpBHs7qxuktYBAoGANaOd\n+Ye7vvdmghAVmG9+GdDSZ/ZlU54nmYZYYwkokAAP/4+cVRVeyxWC4U4EFkVrqui1\nOlwHyNbY+1ZWYfMPS98dykSyb6MSWBB4eSCCKwndxyUaX5K/gH5Dvkh6zJGs6LCT\nWLWEHzPx5pII98Ri4w1Cv2wsDM2hg1X9LLrCe6kCgYAf/rhaBl3cclwubNdeVjw5\nc2TTZzX4pZPbTp3qYqMfUBn90MYbhDhCl9YUlCXdvuqQevrbU2KcKNJ4oSelhozM\nzGePVm4FIItXIIEfLl25j1VmOXA3NstNwCmQsAJb+azMY6UjmnQR9bTVO5aEPovj\nCmbJ178461X3tOqwcYQ6ew==\n-----END PRIVATE KEY-----\n";

        $now_seconds = time();
        $payload = [
            "iss" => env('FIREBASE_CLIENT_EMAIL'),
            "sub" => env('FIREBASE_CLIENT_EMAIL'),
            "aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
            "iat" => $now_seconds,
            "exp" => $now_seconds+(60*60),
            "uid" => $request->user()->id,
        ];
        return \Firebase\JWT\JWT::encode($payload, $secret, "RS256");
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
