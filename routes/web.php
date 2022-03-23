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
    return view('home');
});

Route::get('/my-work', function () {
    return view('overviews/generalOverview');
});

Route::get('/kata8', function () {
    return view('overviews/kata8Overview');
});

Route::get('/wide-mouth-frog', function () {
    return view('../kata8/theWideMouthFrog');
});

Route::post('/wide-mouth-frog/submit', 'App\Http\Controllers\Kata8\TheWideMouthFrogController@animalNameFormSubmit')
    ->name('wide-mouth-frog-form-submit');

Route::get('/calculate-the-mean', function () {
    return view('../kata8/meanOfAnArray');
});

Route::post('/calculate-the-mean/submit', 'App\Http\Controllers\Kata8\MeanOfAnArrayController@meanOfAnArrayFormSubmit')
    ->name('calculate-the-mean-form-submit');

Route::get('/reverse-words', function () {
    return view('../kata8/reverseWords');
});

Route::post('/reverse-words/submit', 'App\Http\Controllers\Kata8\ReverseWordsController@reverseWordsFormSubmit')
    ->name('reverse-words-form-submit');

Route::get('/remove-first-and-last-character', function () {
    return view('../kata8/removeFirstAndLastCharacter');
});

Route::post('/remove-first-and-last-character/submit',
    'App\Http\Controllers\Kata8\RemoveFirstAndLastCharacterController@removeFirstAndLastCharacterFormSubmit')
    ->name('remove-first-and-last-character-form-submit');

Route::get('/kata7', function () {
    return view('overviews/kata7Overview');
});

Route::get('/highest-and-lowest', function () {
    return view('../kata7/highestAndLowestNumbers');
});

Route::post('/highest-and-lowest/submit',
    'App\Http\Controllers\Kata7\HighestAndLowestNumbersController@highestAndLowestNumbersFormSubmit')
    ->name('highest-and-lowest-form-submit');
