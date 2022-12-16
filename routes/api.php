<?php

use App\Http\Controllers\API\ApiGiriController;
use App\Http\Controllers\API\ApiMojopanggungController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PengumumanController;
use App\Http\Controllers\API\SuratController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/add_mojopanggung', [ApiMojopanggungController::class, 'store']);
    Route::get('/edit_mojopanggung/{id}', [ApiMojopanggungController::class, 'edit']);
    Route::put('/update_mojopanggung/{id}', [ApiMojopanggungController::class, 'update']);
    Route::get('/view_mojopanggung', [ApiMojopanggungController::class, 'index']);
    Route::post('/add_pengumuman', [PengumumanController::class, 'store']);
    Route::get('/view_pengumunan', [PengumumanController::class, 'index']);
    Route::get('/delete_mojopanggung/{id}', [ApiMojopanggungController::class, 'destroy']);
    Route::put('/update_pengumuman/{id}', [PengumumanController::class, 'update']);
    Route::delete('/delete_pengumuman/{id}', [PengumumanController::class, 'destroy']);

});
Route::post('/register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//Api
Route::group(['prefix' => 'sur'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/surat', [SuratController::class, 'index']);
    Route::post('surat/add', [SuratController::class, 'add']);
    Route::post('surat/update',[SuratController::class, 'update']);
    Route::post('surat/delete',[SuratController::class, 'delete']);
    });
});