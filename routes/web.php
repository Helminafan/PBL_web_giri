<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenatabanController;
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
Route::prefix('Penataban')->group(function(){
    Route::get('/view',[PenatabanController::class, 'index'])->name('penataban.view');
    // Route::get('/add',[UserController::class, 'UserAdd'])->name('user.add');
    // Route::post('/store',[UserController::class, 'UserStore'])->name('users.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});
Route::get('/auth/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
