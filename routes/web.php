<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// Gets
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.dashboard');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->where('contact', '[0-9]+')->name('contacts.edit');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->where('contact', '[0-9]+')->name('contacts.show');
Route::get('/contacts/{contact}/delete', [ContactController::class, 'destroy'])->where('contact', '[0-9]+')->name('contacts.delete');

// Posts
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Puts
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->where('contact', '[0-9]+')->name('contacts.update');
