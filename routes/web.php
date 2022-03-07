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

Route::get('/my-work', function () {
    return view('overviews/generalOverview');
});

Route::get('/kata8', function () {
    return view('overviews/kata8Overview');
});

Route::get('/wide-mouth-frog', function () {
    return view('../challengers/theWideMouthFrog');
});

Route::post('/wide-mouth-frog/submit', 'App\Http\Controllers\TheWideMouthFrogController@animalNameFormSubmit')
    ->name('wide-mouth-frog-form-submit');

Route::get('/calculate-the-mean', function () {
    return view('../challengers/meanOfAnArray');
});

Route::post('/calculate-the-mean/submit', 'App\Http\Controllers\MeanOfAnArrayController@meanOfAnArrayFormSubmit')
    ->name('calculate-the-mean-form-submit');

Route::get('/reverse-words', function () {
    return view('../challengers/reverseWords');
});

Route::post('/reverse-words/submit', 'App\Http\Controllers\ReverseWordsController@reverseWordsFormSubmit')
    ->name('reverse-words-form-submit');

Route::get('/remove-first-and-last-character', function () {
    return view('../challengers/removeFirstAndLastCharacter');
});

Route::post('/remove-first-and-last-character/submit',
    'App\Http\Controllers\RemoveFirstAndLastCharacterController@removeFirstAndLastCharacterFormSubmit')
    ->name('remove-first-and-last-character-form-submit');

Route::get('/string-repeat', function () {
    return view('../challengers/stringRepeat');
});

Route::post('/string-repeat/submit',
    'App\Http\Controllers\StringRepeatController@stringRepeatFormSubmit')
    ->name('string-repeat-form-submit');


