<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('detail');

Route::post('/events', [EventController::class, 'store'])->name('store')->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('destroy')->middleware('auth');
