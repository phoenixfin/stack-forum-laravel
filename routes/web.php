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

Route::get('/', 'QuestionController@index');

Route::resource('question','QuestionController');
Route::resource('answer','AnswerController');
Route::get('answer/{question_id}/create', 'AnswerController@create_by_question');