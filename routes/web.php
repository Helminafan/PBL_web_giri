<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GiriController;
use App\Http\Controllers\KelGiri;
use App\Http\Controllers\mojopanggung;
use App\Http\Controllers\PenatabanController;
use App\Http\Controllers\boyolanguController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GrogolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JambesariController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserKelDesController;
use App\Models\warga;
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
    Route::get('/dashboard', [HomeController::class, 'redirectUser'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/dashboard', function () {
        $mojopanggung = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 2)->count();

        $Giri = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 3)->count();

        $Boyolangu = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 4)->count();

        $Grogol = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 5)->count();

        $penataban = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 6)->count();

        $Jembersari = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 7)->count();
        $warga = warga::count();

        return view('admin.main.index', compact('mojopanggung', 'Giri', 'Boyolangu', 'Grogol', 'Jembersari', 'penataban', 'warga'));
    })->name('admin.dashboard');
    Route::get('/laporan', [ExportController::class, 'export'])->name('kelurahan.export');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:user']], function () {
    Route::get('/dashboard', function () {
        $mojopanggung = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 2)->count();

        $Giri = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 3)->count();

        $Boyolangu = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 4)->count();

        $Grogol = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 5)->count();

        $Jembersari = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 7)->count();

        $penataban = warga::select(DB::raw("COUNT(*) as jumlah"))
            ->where('id_kelurahan', '=', 6)->count();
        $warga = warga::all()->count();
        return view('user.main.index', compact('mojopanggung', 'Giri', 'Boyolangu', 'Grogol', 'Jembersari', 'penataban','warga'));
    })->name('kelgiri.dashboard');
    Route::get('/view', [UserKelDesController::class, 'index'])->name('user_kelgiri.view');
    Route::get('/add', [UserKelDesController::class, 'create'])->name('user_kelgiri.add');
    Route::post('/store', [UserKelDesController::class, 'store'])->name('user_kelgiri.store');
});


Route::group(['prefix' => 'Giri', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [GiriController::class, 'index'])->name('giri.view');
    // Route::get('/add', [GiriController::class, 'create'])->name('giri.add');
    // Route::post('/store', [GiriController::class, 'store'])->name('giri.store');
    // Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    // Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    // Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

Route::group(['prefix' => 'penataban', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [PenatabanController::class, 'index'])->name('penataban.view');
    Route::get('/add', [PenatabanController::class, 'create'])->name('penataban.add');
    Route::post('/store', [PenatabanController::class, 'store'])->name('penataban.store');
    Route::get('/edit/{id}', [penatabanController::class, 'edit'])->name('penataban.edit');
    Route::post('/update/{id}', [PenatabanController::class, 'update'])->name('penataban.update');
    Route::get('/delete/{id}', [PenatabanController::class, 'destroy'])->name('penataban.delete');
});
Route::group(['prefix' => 'grogol', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [GrogolController::class, 'index'])->name('grogol.view');
    Route::get('/add', [GrogolController::class, 'create'])->name('grogol.add');
    Route::post('/store', [GrogolController::class, 'store'])->name('grogol.store');
    Route::get('/edit/{id}', [GrogolController::class, 'edit'])->name('grogol.edit');
    Route::post('/update/{id}', [GrogolController::class, 'update'])->name('grogol.update');
    Route::get('/delete/{id}', [GrogolController::class, 'destroy'])->name('grogol.delete');
});
Route::group(['prefix' => 'kelgiri', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [KelGiri::class, 'index'])->name('kelgiri.view');
    Route::get('/add', [KelGiri::class, 'create'])->name('kelgiri.add');
    Route::post('/store', [KelGiri::class, 'store'])->name('kelgiri.store');
    Route::get('/edit/{id}', [KelGiri::class, 'edit'])->name('kelgiri.edit');
    Route::post('/update/{id}', [KelGiri::class, 'update'])->name('kelgiri.update');
    Route::get('/delete/{id}', [KelGiri::class, 'destroy'])->name('kelgiri.delete');
});
Route::group(['prefix' => 'mojopanggung', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [mojopanggung::class, 'index'])->name('mojopanggung.view');
    Route::get('/add', [mojopanggung::class, 'create'])->name('mojopanggung.add');
    Route::post('/store', [mojopanggung::class, 'store'])->name('mojopanggung.store');
    Route::get('/edit/{id}', [mojopanggung::class, 'edit'])->name('mojopanggung.edit');
    Route::post('/update/{id}', [mojopanggung::class, 'update'])->name('mojopanggung.update');
    Route::get('/delete/{id}', [mojopanggung::class, 'delete'])->name('mojopanggung.delete');
});
Route::group(['prefix' => 'boyolangu', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [boyolanguController::class, 'index'])->name('boyolangu.view');
    Route::get('/add', [boyolanguController::class, 'create'])->name('boyolangu.add');
    Route::post('/store', [boyolanguController::class, 'store'])->name('boyolangu.store');
    Route::get('/edit/{id}', [boyolanguController::class, 'edit'])->name('boyolangu.edit');
    Route::post('/update/{id}', [boyolanguController::class, 'update'])->name('boyolangu.update');
    Route::get('/delete/{id}', [boyolanguController::class, 'destroy'])->name('users.delete');
});
Route::group(['prefix' => 'jembersari', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/view', [JambesariController::class, 'index'])->name('jambesari.view');
    Route::get('/add', [JambesariController::class, 'create'])->name('jambesari.add');
    Route::post('/store', [JambesariController::class, 'store'])->name('jambesari.store');
    Route::get('/edit/{id}', [JambesariController::class, 'edit'])->name('jambesari.edit');
    Route::post('/update/{id}', [JambesariController::class, 'update'])->name('jambesari.update');
    Route::get('/delete/{id}', [JambesariController::class, 'destroy'])->name('jambesari.delete');
});

Route::get('/test', [TestController::class, 'test']);


Route::get('/auth/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
