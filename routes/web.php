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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'isAdmin'], function () {

    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');
    Route::get('exam/assign', 'ExamController@create')->name('exam.assign');
    Route::post('exam/assign', 'ExamController@assign')->name('exam.assignExam');
    Route::get('exam/user', 'ExamController@userExam')->name('view.exam');
    Route::post('exam/remove', 'ExamController@remove')->name('exam.remove');
    Route::resource('user', 'UserController');

});

