<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\resortcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/user', [usercontroller::class, 'index']);
Route::get('/admin', [admincontroller::class, 'index'])->middleware(['auth','admin']);


Route::get('/addresort', [resortcontroller::class, 'index'])->name('add.resort')->middleware(['auth','admin']);
Route::post('/addresort', [resortcontroller::class, 'store'])->name('store.resort')->middleware(['auth','admin']);
Route::delete('/addresort/{Resort}', [resortcontroller::class, 'destroy'])->name('delete.resort')->middleware(['auth','admin']);


Route::get('/userresort', [ResortController::class, 'usershow'])->name('user.resort');
Route::post('/userresort/order', [ResortController::class, 'orderResort'])->name('user.resort.order');


require __DIR__.'/auth.php';
