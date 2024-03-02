<?php

use Illuminate\Support\Facades\Route;

use Samybgt\Screenwidth\app\Http\Controllers\ScreenwidthController;



Route::group(
[   
    'middleware' => 'web',
    'namespace'  => 'Samybgt\Screenwidth\dapp\Http\Controllers',
],
function () {

    Route::get('/getScreenWidth', [ScreenwidthController::class, 'getScreenWidth'])->name('getScreenWidth');
    Route::post('/setScreenWidth', [ScreenwidthController::class, 'setScreenWidth'])->name('setScreenWidth');
    Route::get('/checkScreenWidth', [ScreenwidthController::class, 'checkScreenWidth'])->name('checkScreenWidth');
    Route::post('/reportWindowSize', [ScreenwidthController::class, 'reportWindowSize'])->name('reportWindowSize');

});
