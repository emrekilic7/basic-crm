<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Index;
use App\Http\Livewire\Customer\Index as CustomerIndex;
use App\Http\Livewire\Customer\Create as CustomerCreate;
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

/* Customer */
Route::middleware(['auth'])->group(function () {
    Route::get('customer', CustomerIndex::class)->name('customer.index');
    Route::get('customer/create', CustomerCreate::class)->name('customer.create');
});