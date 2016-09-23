<?php

Route::group(['domain' => env('APP_DOMAIN_FRONTEND'), 'middleware' => 'web'], function () {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require(__DIR__ . '/Language/Language.php');
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require(__DIR__ . '/Frontend/Frontend.php');
        require(__DIR__ . '/Frontend/Access.php');
    });
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['domain' => env('APP_DOMAIN_BACKEND'), 'namespace' => 'Backend'], function () {

    /**
     * Redirect to the login page if not loged in
     */
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', function () {
            return redirect()->route('auth.login');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        /**
         * These routes need view-backend permission
         * (good if you want to allow more than one group in the backend,
         * then limit the backend features by different roles or permissions)
         *
         * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
         */
        require(__DIR__ . '/Backend/Dashboard.php');
        require(__DIR__ . '/Backend/Access.php');
        require(__DIR__ . '/Backend/LogViewer.php');
    });


});
