<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskListController;
Route::post("/signup",[UserController::class,"store"]);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post("/task/createTask",[TaskListController::class,'store']);
Route::get("/task/getAllTasks",[TaskListController::class,'index']);
Route::get("/task/getTaskById/{taskId}",[TaskListController::class,'show']);