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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//question
Route::post('/form/{id}/question/append','QuestionController@store')->name("inputQuestion");
Route::post('/form/{id}/question/update/title','QuestionController@updateTitle');
Route::post('/form/{id}/{value}/question/update/type','QuestionController@updateType');
//option
Route::post('/form/{question_id}/question/option','QuestionOptionController@store');
Route::post('/form/{option_id}/question/update/option','QuestionOptionController@update');
//form
Route::post('/form/{id}/update/title','FormController@updateTitle');
Route::post('/form/{id}/update/description','FormController@updateDescription');
