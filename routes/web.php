<?php

use App\Http\Controllers\GameweekController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AccountController;
use App\Models\Gameweek;
use Illuminate\Support\Facades\Route;
use \SportmonksFootballApi as SFA;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PredictionController::class, 'index'])->middleware('auth');

Route::post('predictions', [PredictionController::class, 'store'])->middleware('auth');

Route::get('/test', function(){
    $data = SFA::league()->byId(501);
    ddd($data);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('account', [AccountController::class, 'index'])->middleware('auth');
Route::post('account', [AccountController::class, 'update'])->middleware('auth');
Route::get('account/predictions', [PredictionController::class, 'show'])->middleware('auth');
