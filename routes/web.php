<?php

ini_set("memory_limit",0);
use App\Http\Controllers\MeetController;
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
    return view('welcome');
});

Route::get('/meeting', function() {
    return view('meeting');
});

Route::post('/meet_save', [MeetController::class, 'saveMeet']);