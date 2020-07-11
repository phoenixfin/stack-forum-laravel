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

Route::get('answer/{question_id}/create', 'AnswerController@create');
Route::get('answer/{question_id}/{answer_id}/edit', 'AnswerController@edit');
Route::get('answer/{question_id}/{answer_id}/show', 'AnswerController@show');
Route::post('answer/{question_id}', 'AnswerController@store');
Route::put('answer/{question_id}/{answer_id}', 'AnswerController@update');
Route::delete('answer/{question_id}/{answer_id}', 'AnswerController@destroy');

Route::post('question/upvote','VoteController@upvote')->name('upvote');
Route::post('question/downvote','VoteController@downvote')->name('downvote');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
