<?php

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
    //Route::get('question', [QuestionController::class, 'create'])->name('create');
    Route::resource('user', 'UserController');
});

