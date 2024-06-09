<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthOtpController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('auth/register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

Route::controller(AuthOtpController::class)->group(function(){
    Route::get('/otp/login', 'login')->name('otp.login');
    Route::post('/otp/generate', 'generate')->name('otp.generate');
    Route::get('/otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('/otp/login', 'loginWithOtp')->name('otp.getlogin');

    // Add this route for registering with OTP
    Route::get('/otp/registration-verification/{user_id}', [AuthOtpController::class, 'registrationVerification'])->name('otp.registration.verification');
    Route::post('/otp/register', [AuthOtpController::class, 'registerWithOtp'])->name('otp.register');
});

