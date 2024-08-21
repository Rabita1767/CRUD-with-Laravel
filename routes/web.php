<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
// Route::resource("user",UserController::class);

// Route::get("/getAllUser",[UserController::class,"index"]);
// Route::post('/signup', [UserController::class, 'store']);

