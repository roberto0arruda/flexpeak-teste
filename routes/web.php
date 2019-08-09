<?php

Route::redirect('/', '/site', 301);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/site', 'HomeController@site');
Route::get('/site/v2', 'HomeController@vue')->name('vue');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home/integral-pdf','HomeController@generatePDF');
    Route::resource('professores', 'ProfessorController', ['except' => 'show']);
    Route::post('professores_restore/{id}', ['uses' => 'ProfessorController@restore', 'as' => 'professores.restore']);
    Route::resource('cursos', 'CursoController');
    Route::resource('alunos', 'AlunoController', ['except' => 'show']);
});
