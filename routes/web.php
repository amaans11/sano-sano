<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\ExportController;
use App\Http\Livewire\Screens\FormProfileAge;
use App\Http\Livewire\Screens\FormProfileAllergies;
use App\Http\Livewire\Screens\FormProfileGender;
use App\Http\Livewire\Screens\FormProfileKidsAge;
use App\Http\Livewire\Screens\FormSignup;
use App\Http\Livewire\Screens\HealthPriorities;
use App\Http\Livewire\Screens\HouseholdForm;
use App\Http\Livewire\Screens\SurveyCompleted;
use App\Http\Livewire\Screens\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/logout');
})->name('dashboard');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
});

// Screens
Route::middleware(['guest'])->group(function () {
    Route::get('/app', Welcome::class)->name('welcome');
});
Route::get('/login', Welcome::class)->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile-age-form', FormProfileAge::class)->name('formProfileAge');
    Route::get('/profile-gender-form', FormProfileGender::class)->name('formProfileGender');
    Route::get('/household-form', HouseholdForm::class)->name('householdForm');
    Route::get('/profile-kids-age-form', FormProfileKidsAge::class)->name('formProfileKidsAge');
    Route::get('/profile-allergies', FormProfileAllergies::class)->name('formProfileAllergies');
    Route::get('/health-priorities', HealthPriorities::class)->name('healthPriorities');
    Route::get('/signup-form', FormSignup::class)->name('formSignup');
    Route::get('/survey-completed', SurveyCompleted::class)->name('surveyCompleted');
});

//unbounce
Route::get('/u/{slug}', function ($slug) {
    return view('unbounce', ['slug' => $slug]);
})->name('unbounce');

Route::get('/', function () {
    return view('unbounce', ['slug' => 'home']);
})->name('home');

Route::get('/export/users', [ExportController::class, 'users'])
    ->name('export.users');
