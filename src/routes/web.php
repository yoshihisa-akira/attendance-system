<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkTimeController;
use App\Http\Controllers\RestTimeController;

Route::middleware('auth')->group(function () {
    Route::get('/',[WorkTimeController::class, 'index']);
    Route::get('/date',[WorkTimeController::class,'date']);
});
Route::post('/WorkDateTime',[WorkTimeController::class,'punchIn']);
Route::patch('/WorkDateTime/update',[WorkTimeController::class,'update']);
Route::post('/RestDateTime',[RestTimeController::class,'punchIn']);
Route::patch('/RestDateTime/update', [RestTimeController::class, 'update']);