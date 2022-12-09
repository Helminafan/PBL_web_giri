<?php

use App\Http\Controllers\API\Auth\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/store', [ApiPetugasController::class, 'store']);
    Route::get('/indexPetugas', [ApiPetugasController::class, 'index']);
    Route::get('/index', [NasabahController::class, 'index']);
    Route::get('/logoutNasabah', [NasabahController::class, 'logoutNasabah']);
    Route::get('/logoutPetugas', [ApiPetugasController::class, 'logoutPetugas']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
