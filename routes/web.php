<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\BankController;
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
Auth::routes(); //login/register...
Route::get('/setlocale/{locale}', [UserController::class, 'setLocale'])->name('setlocale');

/* Routes that needs authentication. Guests will be redirected to the login screen. */
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('home'); })->name('home');
    Route::get('/home', function () { return view('home'); })->name('home');
    
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/account', [BankController::class, 'index'])->name('account');
    Route::get('/todos', [TodoController::class, 'index'])->name('todos');
    
});
