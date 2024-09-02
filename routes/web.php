<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IdentityVerification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/listings/{id}/', [ListingController::class, 'show'])->name('listings')->middleware(['auth', 'verified']);

Route::get('/listing/add', [ListingController::class,'create'])->name('listings.add');
Route::post('/listings', [ListingController::class,'store'])->name('listings.store');

Route::resource('user', UserController::class)->only('show', 'edit', 'update')->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/verify-identity', function () {
    return view('auth.verify-identity');
})->name('verify-identity')->middleware(IdentityVerification::class);

Route::post('/verify-identity', [UploadVerificationController::class, 'storeVerification'])
    ->middleware(['auth', 'verified'])->name('storeVerification');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

 Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });

Auth::routes();

 Route::fallback(function () {
    return redirect('/');
 });


require __DIR__ . '/auth.php';
