<?php

use Illuminate\Support\Facades\Route;

use Samybgt\Screenwidth\app\Http\Controllers\ScreenwidthController;


Route::group(
[   
    'namespace'  => 'Samybgt\Screenwidth\dapp\Http\Controllers',
],
function () {

    Route::get('/getScreenWidth', [ScreenwidthController::class, 'getScreenWidth'])->name('getScreenWidth');
    Route::get('/checkScreenWidth', [ScreenwidthController::class, 'checkScreenWidth'])->name('checkScreenWidth');

});



Route::group(
[   
    'middleware' => 'web',
    'namespace'  => 'Samybgt\Screenwidth\dapp\Http\Controllers',
],
function () {

    Route::post('/setScreenWidth', [ScreenwidthController::class, 'setScreenWidth'])->name('setScreenWidth');

});
