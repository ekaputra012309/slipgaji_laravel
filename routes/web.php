<?php

use App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PegawaiController;
use App\Http\Controllers\Backend\PotonganController;
use App\Http\Controllers\Backend\PrivilageController;
use App\Http\Controllers\Backend\SlipgajiController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [Backend::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [Backend::class, 'profile'])->name('profile.edit');
});

Route::get('/', [Backend::class, 'signin'])->name('signin');
Route::get('/register', [Backend::class, 'register'])->name('register');
Route::get('/get-role-name', [PrivilageController::class, 'getRoleName'])->name('get.role.name');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('pegawai', PegawaiController::class); //pegawai
    Route::patch('/pegawai/{pegawai}/status', [PegawaiController::class, 'updateStatus'])->name('pegawai.updateStatus');
    Route::get('/pegawai-inactive', [PegawaiController::class, 'index2'])->name('pegawai.index2');
    Route::resource('potongan', PotonganController::class); //potongan
    Route::resource('about', AboutController::class); //about
    Route::resource('slipgaji', SlipgajiController::class); //slipgaji
    Route::resource('user', UserController::class); //user

    Route::get('/user/{id}/reset-password', [UserController::class, 'resetPassword'])->name('user.resetPassword');
    Route::get('/slipgaji-{pegawai_id}', [SlipgajiController::class, 'getPotonganByPegawai'])->name('slipgaji.getByPegawai');
});

require __DIR__ . '/auth.php';
