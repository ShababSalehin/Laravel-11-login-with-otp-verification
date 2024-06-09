<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthOtpController extends Controller
{
    // Return View of OTP Login Page
    public function login()
    {
        return view('auth.otp-login');
    }

    // Generate OTP
    public function generate(Request $request)
    {
        # Validate Data
        $request->validate([
            'mobile_no' => 'required|exists:users,mobile_no'
        ]);

        # Generate An OTP
        $verificationCode = $this->generateOtp($request->mobile_no);

        // $message = "Your OTP To Login is - " . $verificationCode->otp;
        $message = "Enter your OTP to login";

        # Return With OTP as JSON if request expects JSON
        if ($request->expectsJson()) {
            return response()->json(['success' => $message]);
        }

        # Otherwise, redirect to the verification page
        return redirect()->route('otp.verification', ['user_id' => $verificationCode->user_id])->with('success', $message);
    }

    public function generateOtp($mobile_no)
    {
        $user = User::where('mobile_no', $mobile_no)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = VerificationCode::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if ($verificationCode && $now->isBefore($verificationCode->expired_at)) {
            return $verificationCode;
        }

        // Create a New OTP
        return VerificationCode::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expired_at' => Carbon::now()->addMinutes(10)
        ]);
    }

    public function verification($user_id)
    {
        return view('auth.otp-verification')->with([
            'user_id' => $user_id
        ]);
    }

    public function loginWithOtp(Request $request)
    {
        #Validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode = VerificationCode::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        } elseif ($verificationCode && $now->isAfter($verificationCode->expired_at)) {
            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if ($user) {
            // Expire The OTP
            $verificationCode->update([
                'expired_at' => Carbon::now()
            ]);

            Auth::login($user);

            return redirect('/home');
        }

        return redirect()->route('otp.login')->with('error', 'Your Otp is not correct');
    }




    public function registerWithOtp(Request $request)
    {
        // Validate OTP
        $verificationCode = VerificationCode::find(Session::get('verification_code_id'));
        if (!$verificationCode || $verificationCode->otp !== $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

        // Clear session data
        Session::forget(['user_id', 'verification_code_id']);

        // Proceed with user registration
        $user = User::find(Session::get('user_id'));
        Auth::login($user);

        return redirect()->route('home');
    }
}
