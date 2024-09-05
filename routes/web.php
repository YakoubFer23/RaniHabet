<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadVerificationController;
use App\Http\Middleware\Authorized;
use App\Http\Middleware\ListApplyControll;
use App\Http\Middleware\PublicProfile;
use App\Http\Middleware\SameGender;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IdentityVerification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ChangePasswordController;
use App\Models\Listing;


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/listings/{id}/', [ListingController::class, 'show'])->name('listings.show')->middleware(['auth', 'verified']);

Route::get('/listing/add', [ListingController::class,'create'])->name('listings.add');
Route::post('/listings', [ListingController::class,'store'])->name('listings.store')->middleware(ListApplyControll::class);
Route::post('/listings/{id}/apply', [ListingController::class, 'apply'])->name('listings.apply')->middleware(SameGender::class, ListApplyControll::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dash', [DashController::class, 'show'])->name('dash.index');
    Route::delete('/dash/listing/{id}', [DashController::class, 'destroyListing'])->name('dash.listing.delete');
    Route::delete('/dash/application/{id}', [DashController::class, 'destroyApplication'])->name('dash.application.delete');
});

Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password')->middleware(['auth', 'verified']);

//Route::resource('user', UserController::class)->only('show', 'edit', 'update')->middleware('auth');
Route::get('/user/{id}',[UserController::class,'show'])->name('user.show')->middleware(['auth', PublicProfile::class]);
Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit')->middleware(['auth', Authorized::class]);
Route::put('/user/{id}',[UserController::class,'update'])->name('user.update')->middleware(['auth', Authorized::class]);

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

 

Auth::routes();

 Route::fallback(function () {
    return redirect('/');
 });


require __DIR__ . '/auth.php';
