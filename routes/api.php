<?php

use App\Http\Controllers\API\api_kecamatancontroller;
use App\Http\Controllers\API\ApiGiriController;
use App\Http\Controllers\API\ApiMojopanggungController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\kewargaancontroller;
use App\Http\Controllers\API\PengumumanController;
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
    Route::post('/add_mojopanggung', [ApiMojopanggungController::class, 'store']);
    Route::get('/edit_mojopanggung/{id}', [ApiMojopanggungController::class, 'edit']);
    Route::put('/update_mojopanggung/{id}', [ApiMojopanggungController::class, 'update']);
    Route::get('/view_mojopanggung', [ApiMojopanggungController::class, 'index']);
    Route::put('/update_pengumuman/{id}', [PengumumanController::class, 'update']);
    Route::delete('/delete_pengumuman/{id}', [PengumumanController::class, 'destroy']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('/add_kecamatan', [api_kecamatancontroller::class, 'store']);
Route::get('/edit_kecamatan/{id}', [api_kecamatancontroller::class, 'edit']);
Route::get('/view_kecamatan', [api_kecamatancontroller::class, 'index']);
Route::put('/update_kecamatan/{id}', [api_kecamatancontroller::class, 'update']);
Route::delete('/delete_kecamatan/{id}', [api_kecamatancontroller::class, 'destroy']);
