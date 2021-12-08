<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppoinmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public routes
Route::get('/appoinments', [AppoinmentController::class, 'index']);
Route::get('/appoinments/{id}', [AppoinmentController::class, 'show']);
Route::post('/appoinments/', [AppoinmentController::class, 'store']);
Route::put('/appoinments/{id}', [AppoinmentController::class, 'update']);
Route::delete('/appoinments/{id}', [AppoinmentController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);

//Private routes

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
