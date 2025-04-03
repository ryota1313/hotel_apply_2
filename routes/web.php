<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// トップページ
Route::resource('top', TopController::class);

// プラン、部屋のリソースルート
Route::resource('plan', PlanController::class);
Route::resource('room', RoomController::class);
Route::resource('question',QuestionController::class);

// 通常の予約関連ルート（confirmを除外したリソースコントローラー）
Route::resource('booking', BookingController::class)->except(['create', 'store']);
Route::get('/booking/form', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::get('/booking/confirm', [BookingController::class, 'showConfirmPage'])->name('booking.confirm.show');
Route::get('/booking/search', [BookingController::class, 'search'])->name('booking.search');

// 一般ユーザー認証後のみアクセス可能ルート
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 管理者ログイン関連ルート（認証不要）
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
});

// 管理者専用ルート（ログイン済み管理者のみ）
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/', AdminController::class)->except('index');
});

// 認証関連ルート（Laravel Breezeなどの認証）
require __DIR__.'/auth.php';
