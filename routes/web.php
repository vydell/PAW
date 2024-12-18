<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserEventController;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::get('dashboard', [UserEventController::class, 'myBookings'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// //dashboard
// Route::view('dashboard', 'dashboard.dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

//profile through login
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//events list through login
Route::get('events', [UserEventController::class, 'index'])
    ->middleware(['auth'])
    ->name('events.index');

//event detail of selected event in list
Route::get('events/{id}', [UserEventController::class, 'details'])
    ->middleware(['auth'])
    ->name('events.details');

Route::post('/events/{id}/book', [UserEventController::class, 'book'])->name('events.book');

use App\Http\Controllers\EventController;

Route::post('/dashboard/{id}/checkin', [UserEventController::class, 'checkin'])->name('dashboard.checkin');
Route::post('/dashboard/{event}/cancel', [UserEventController::class, 'cancel'])->name('dashboard.cancel');



require __DIR__ . '/auth.php';
