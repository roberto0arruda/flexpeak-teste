<?php

Route::get('/site', function () {
    return view('welcome');
});

Route::redirect('/', '/site', 301);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');