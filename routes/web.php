<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GiriController;
use App\Http\Controllers\KelGiri;
use App\Http\Controllers\mojopanggung;
use App\Http\Controllers\PenatabanController;
use App\Http\Controllers\boyolanguController;
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

Route::prefix('Giri')->group(function () {
    Route::get('/view', [GiriController::class, 'index'])->name('giri.view');
    // Route::get('/add', [GiriController::class, 'create'])->name('giri.add');
    // Route::post('/store', [GiriController::class, 'store'])->name('giri.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

Route::prefix('Penataban')->group(function () {
    Route::get('/view', [PenatabanController::class, 'index'])->name('penataban.view');
    // Route::get('/add',[UserController::class, 'UserAdd'])->name('user.add');
    // Route::post('/store',[UserController::class, 'UserStore'])->name('users.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});



Route::prefix('KelGiri')->group(function () {
    Route::get('/view', [KelGiri::class, 'index'])->name('kelgiri.view');
    Route::get('/add', [KelGiri::class, 'create'])->name('kelgiri.add');
    Route::post('/store', [KelGiri::class, 'store'])->name('kelgiri.store');
    Route::get('/edit/{id}', [KelGiri::class, 'edit'])->name('kelgiri.edit');
    Route::post('/update/{id}', [KelGiri::class, 'update'])->name('kelgiri.update');
    Route::get('/delete/{id}', [KelGiri::class, 'destroy'])->name('kelgiri.delete');
});

Route::prefix('mojopanggung')->group(function () {
    Route::get('/view', [mojopanggung::class, 'index'])->name('mojopanggung.view');
    Route::get('/add', [mojopanggung::class, 'create'])->name('mojopanggung.add');
    Route::post('/store', [mojopanggung::class, 'store'])->name('mojopanggung.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});
Route::prefix('boyolangu')->group(function () {
    Route::get('/view', [boyolanguController::class, 'index'])->name('boyolangu.view');
    Route::get('/add', [boyolanguController::class, 'create'])->name('boyolangu.add');
    Route::post('/store', [boyolanguController::class, 'store'])->name('boyolangu.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

Route::get('/auth/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
