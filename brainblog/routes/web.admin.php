<?php

Route::group([
    'as' => 'app',
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function() {

    Route::get('/', 'HomeController@index');
    Route::get('/news','HomeController@news' )->name('.admin.news');
    Route::get('/posts','HomeController@posts' )->name('.admin.posts');
    Route::get('/reviews','HomeController@reviews' )->name('.admin.reviews');
});
