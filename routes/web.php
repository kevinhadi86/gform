<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/form','FormController@store');
Route::get('/form/{id}/question','QuestionController@index');
Route::delete('form/delete/{id}','FormController@destroy');
Route::delete('/form/{id}/question/delete/{question_id}','QuestionController@destroy');
Route::delete('/form/{form_id}/question/option/delete/{option_id}','QuestionOptionController@destroy');
