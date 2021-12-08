<?php

use App\Http\Controllers\ContactController;
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

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Private routes
Route::group(['middleware' => 'auth:sanctum'], function() {
    //Appoinment Routes
    Route::post('/appoinments/', [AppoinmentController::class, 'store']);
    Route::put('/appoinments/{id}', [AppoinmentController::class, 'update']);
    Route::delete('/appoinments/{id}', [AppoinmentController::class, 'destroy']);

    //User routes
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
