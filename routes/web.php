<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreeningController;

Route::get('/', function () {
    return redirect('/screening');
});
Route::get('/screening', [ScreeningController::class, 'index']);
Route::post('/screening', [ScreeningController::class, 'store']);
Route::get('/results/{id}', [ScreeningController::class, 'show']);
