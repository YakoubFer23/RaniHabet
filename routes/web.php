<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Tejwak;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadVerificationController;
use App\Http\Middleware\Authorized;
use App\Http\Middleware\Barrage;
use App\Http\Middleware\ListApplyControll;
use App\Http\Middleware\PendingListing;
use App\Http\Middleware\PublicProfile;
use App\Http\Middleware\SameGender;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IdentityVerification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ChangePasswordController;
use App\Models\Listing;


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/listings', [ListingController::class,'store'])->name('listings.store')->middleware(ListApplyControll::class);
    Route::post('/listings/{id}/apply', [ListingController::class, 'apply'])->name('listings.apply')->middleware(SameGender::class, ListApplyControll::class);
    Route::get('/listings/{id}/', [ListingController::class, 'show'])->name('listings.show')->middleware(PendingListing::class);
    Route::get('/listing/add', [ListingController::class,'create'])->name('listings.add');
    Route::get('/dash', [DashController::class, 'show'])->name('dash.index');
    Route::delete('/dash/listing/{id}', [DashController::class, 'destroyListing'])->name('dash.listing.delete');
    Route::delete('/dash/application/{id}', [DashController::class, 'destroyApplication'])->name('dash.application.delete');
    Route::get('/contact', function () {return view('contact');})->name('contact');
    Route::get('/about', function () {return view('about');})->name('about');
    Route::get('/terms', function () {return view('terms');})->name('terms');
    Route::get('/privacy', function () {return view('privacy');})->name('privacy');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::get('/user/{id}',[UserController::class,'show'])->name('user.show')->middleware( PublicProfile::class);
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit')->middleware(Authorized::class);
    Route::put('/user/{id}',[UserController::class,'update'])->name('user.update')->middleware(Authorized::class);
    Route::get('/verify-identity', function () {return view('auth.verify-identity');})->name('verify-identity')->middleware(IdentityVerification::class);
    Route::post('/verify-identity', [UploadVerificationController::class, 'storeVerification'])->middleware(IdentityVerification::class)->name('storeVerification');
    
    Route::get('/tejwak/ibad', [Tejwak::class,'getIbad'])->name('tejwak.ibad')->middleware(Barrage::class);
    Route::post('/tejwak/ibad', [Tejwak::class,'validateIbad'])->name('tejwak.ibad')->middleware(Barrage::class);
    Route::get('/tejwak/diour', [Tejwak::class,'getDiour'])->name('tejwak.diour')->middleware(Barrage::class);
    Route::post('/tejwak/diour', [Tejwak::class,'validateDiour'])->name('tejwak.diour')->middleware(Barrage::class);
    // Route::get('/storage/IdentityVerification')->middleware(Barrage::class);

});


//Route::resource('user', UserController::class)->only('show', 'edit', 'update')->middleware('auth');




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
