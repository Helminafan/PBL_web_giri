<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\KelurahanController;
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
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.main.index');
    })->name('dashboard');
});
Route::get('/auth/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');


Route::get('/kelurahan1/view', [KelurahanController::class, 'Kelurahan1View'])->name('kelurahan1.view');
