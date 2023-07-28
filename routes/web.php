<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Index */
Route::get('/', Index::class)->name('index');

/* Auth */
Route::get('login', Login::class)->name('login')->middleware('guest');