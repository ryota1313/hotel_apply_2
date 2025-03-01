<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/booking/form', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::get('/booking/confirm', [BookingController::class, 'showConfirmPage'])->name('booking.confirm.show');

Route::resource('top',TopController::class);
Route::resource('plan',PlanController::class);
Route::resource('admin',AdminController::class);
Route::resource('room',RoomController::class);
// リソースルートからconfirmのルートを除外
Route::resource('booking', BookingController::class)->except(['confirm']);

// ルート定義を確認
// routes/web.php で以下のように定義されているか確認



require __DIR__.'/auth.php';
