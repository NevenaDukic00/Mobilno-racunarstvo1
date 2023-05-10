<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/moviesU', [MovieController::class, 'edit']);
Route::post('/movies', [MovieController::class, 'add']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/genres', [GenreController::class, 'index']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/tickets/{id}', [TicketController::class, 'index']);
    Route::get('/tickets', [TicketController::class, 'index1']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::resource('/movies', MovieController::class)->only(['destroy', 'update']);
});
