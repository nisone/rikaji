<?php

use App\Mail\NeedStatusUpdated;
use Illuminate\Support\Facades\Mail;
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

Volt::route('reports-reportby/{report}', 'reports.reportby')
    ->middleware(['auth'])
    ->name('reports.reportby');

Route::view('addreport', 'addreport')
    ->middleware(['auth'])
    ->name('addreport');

Route::get('/mail-test', function (){
    Mail::to('amad@example.com')->send(new NeedStatusUpdated());
});

require __DIR__ . '/auth.php';
