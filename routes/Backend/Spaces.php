<?php

Route::group([
    'prefix'     => 'spaces',
    'as'         => 'spaces.',
    'namespace'  => 'Spaces',
], function () {

    /*
     * Search Specific Functionality
     */
    Route::get('/', 'SpacesController@index')->name('index');
});