<?php

Route::group([
    'prefix'     => 'psots',
    'as'         => 'posts.',
    'namespace'  => 'Posts',
], function () {

    /*
     * Search Specific Functionality
     */
    Route::get('/', 'PostsController@index')->name('index');
});