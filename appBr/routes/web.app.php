<?php

Route::group([
    'as' => 'app.',
    'namespace' => 'Front',
], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('projects', 'ProjectsController')
         ->middleware(['auth']);

});
