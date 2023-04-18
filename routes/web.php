<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/images', [App\Http\Controllers\ImageController::class, 'all'])->name('images');


Route::post('/text/encrypt', [App\Http\Controllers\EncryptionController::class, 'textEncrypt'])->name('text.encrypt');

Route::post('/text/decrypt', [App\Http\Controllers\EncryptionController::class, 'textDecrypt'])->name('text.decrypt');

Route::post('/image/encrypt', [App\Http\Controllers\EncryptionController::class, 'encryptImage'])->name('image.encrypt');


Route::post('/decrypt-image', [App\Http\Controllers\EncryptionController::class, 'decryptImage'])->name('image.decrypt');