<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/quiz', 'App\Http\Controllers\QuizController@getQuiz');

Route::get('/singleQuestion/{question}', 'App\Http\Controllers\QuizController@getSingle');

Route::get('/questions/create', 'App\Http\Controllers\QuestionsController@create');

Route::post('/quiz/result', 'App\Http\Controllers\QuizController@result');

Route::get('/questions', 'App\Http\Controllers\QuestionsController@index');

Route::get('/options/create', 'App\Http\Controllers\OptionsController@create');

Route::post('/questions', 'App\Http\Controllers\QuestionsController@store');

Route::post('/options', 'App\Http\Controllers\OptionsController@store');

Route::get('/questions/{question}', 'App\Http\Controllers\QuestionsController@show');

Route::post('/questions/{question}/options', 'App\Http\Controllers\OptionsController@store');

Route::get('/questions/edit/{id}', 'App\Http\Controllers\QuestionsController@edit');

Route::post('/questions/update/{id}', 'App\Http\Controllers\QuestionsController@update');

Route::get('/options/edit/{id}', 'App\Http\Controllers\OptionsController@edit');

Route::post('/options/update/{id}', 'App\Http\Controllers\OptionsController@update');

Route::get('/questionsids', 'App\Http\Controllers\QuizController@getIds');


