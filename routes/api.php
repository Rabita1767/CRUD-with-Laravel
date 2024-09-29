<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\AuthController; 
use App\Http\Middleware\JwtMiddleware;
Route::post("/signup", [AuthController::class, 'signup']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api'); 

Route::middleware(['auth:api'])->group(function () {
    Route::post("/task/createTask", [TaskListController::class, 'store']);
    Route::get("/task/getAllTasks", [TaskListController::class, 'index']);
    Route::get("/task/getTaskById/{taskId}", [TaskListController::class, 'show']);
    Route::put("/task/updateTaskById/{taskId}", [TaskListController::class, "update"]);
    Route::delete("/task/deleteById/{taskId}", [TaskListController::class, "destroy"]);
});