<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GiriController;
use App\Http\Controllers\KelGiri;
use App\Http\Controllers\mojopanggung;
use App\Http\Controllers\PenatabanController;
use App\Http\Controllers\boyolanguController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserMojopanggungController;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class, 'redirectUser'])->name('dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])->group(function () {
    Route::get('/dashboard/admin', function () { return view('admin.main.index');})->name('admin.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:mojopanggung'])->group(function () {
    Route::get('/home', function () {
        return view('user.mojopanggung.main.index');
    })->name('mojopanggung.dashboard');
    Route::get('/view',[UserMojopanggungController::class, 'index'])->name('user_mojopanggung.view');
    Route::get('/add',[UserMojopanggungController::class, 'create'])->name('user_mojopanggung.add');
    Route::post('/store',[UserMojopanggungController::class, 'store'])->name('user_mojopanggung.store');
    
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
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}', [KelGiri::class, 'destroy'])->name('kelgiri.delete');
});

Route::prefix('mojopanggung')->group(function () {
    Route::get('/view', [mojopanggung::class, 'index'])->name('mojopanggung.view');
    Route::get('/add', [mojopanggung::class, 'create'])->name('mojopanggung.add');
    Route::post('/store', [mojopanggung::class, 'store'])->name('mojopanggung.store');
    Route::get('/edit/{id}',[mojopanggung::class, 'edit'])->name('mojopanggung.edit');
    Route::post('/update/{id}',[mojopanggung::class, 'update'])->name('mojopanggung.update');
    Route::get('/delete/{id}',[mojopanggung::class, 'destroy'])->name('mojopanggung.delete');
    Route::post('/check_nik',[mojopanggung::class, 'checkNik'])->name('check_nik');
});
Route::prefix('boyolangu')->group(function () {
    Route::get('/view', [boyolanguController::class, 'index'])->name('boyolangu.view');
    Route::get('/add', [boyolanguController::class, 'create'])->name('boyolangu.add');
    Route::put('/store', [boyolanguController::class, 'store'])->name('boyolangu.store');
    Route::get('/edit/{id}', [boyolanguController::class, 'edit'])->name('boyolangu.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('boyolangu.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

Route::get('/auth/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
