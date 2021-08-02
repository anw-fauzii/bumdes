<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ShuController;
use App\Http\Controllers\ProfilBumdesController;
use App\Http\Controllers\JenisUsahaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FotoController;

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

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/kec/{id}', [HomeController::class, 'store']);
Route::get('/cari/{id}', [ShuController::class, 'cari']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () { 
    Route::middleware(['auth:sanctum', 'verified'])
        ->get('dashboard',[HomeController::class,'index'])->name('dashboard');

    Route::get('tentang',[HomeController::class,'tentang'])->name('tentang');
    Route::resource('kabupaten', KabupatenController::class);
    Route::resource('bumdes', ProfilBumdesController::class);
    Route::get('profil',[ProfilBumdesController::class,'profil'])->name('profil');
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('user', UserController::class);
    Route::resource('shu', ShuController::class);
    Route::resource('foto', FotoController::class);
    Route::resource('jenisUsaha', JenisUsahaController::class);
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});