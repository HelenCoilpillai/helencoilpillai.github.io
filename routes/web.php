<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheWideMouthFrogController;
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
    return view('home');
});

Route::get('/template', function () {
    return view('layout/app');
});

Route::get('/wide-mouth-frog', function () {
    return view('challengers/theWideMouthFrog');
});

Route::post('/wide-mouth-frog/submit', 'App\Https\Controllers\TheWideMouthFrogController@animalNameFormSubmit')
    ->name('wide-mouth-frog-form-submit');


