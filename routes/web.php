<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::view('addbeneficiary', 'addbeneficiary')
    ->middleware(['auth'])
    ->name('addbeneficiary');

Volt::route('beneficiary-user/{user}', 'beneficiaries.user')
    ->middleware(['auth'])
    ->name('beneficiaries.user');

Route::view('addreport', 'addreport')
    ->middleware(['auth'])
    ->name('addreport');

require __DIR__ . '/auth.php';
