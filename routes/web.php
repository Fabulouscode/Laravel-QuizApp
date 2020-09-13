<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();
// Route::resource('quiz', 'QuizController')->except('store', 'create', 'update', 'destrory', 'edit');
// Route::resource('question', 'QuestionController')->except('store', 'create', 'update', 'destrory', 'edit');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');
    Route::get('exam/assign', 'ExamController@create')->name('exam.assign');
    Route::post('exam/assign', 'ExamController@assign')->name('exam.assignExam');
    Route::get('exam/user', 'ExamController@userExam')->name('view.exam');
    Route::post('exam/remove', 'ExamController@remove')->name('exam.remove');
    Route::resource('user', 'UserController');
});

