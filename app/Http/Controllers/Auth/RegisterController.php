<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required', 'numeric', 'digits_between:5,15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'mobile_no' => $data['mobile_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Generate OTP
        $verificationCode = $this->generateOtp($user->mobile_no);

        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful. Please verify your mobile number.',
                'user_id' => $user->id,
                'otp' => $verificationCode->otp
            ]);
        }

        // Redirect to OTP verification form if not expecting JSON
        return redirect()->route('otp.verification', ['user_id' => $user->id])->with('success', 'Registration successful. Please verify your mobile number.');
    }

    protected function generateOtp($mobile_no)
    {
        $user = User::where('mobile_no', $mobile_no)->first();

        // Generate OTP
        return VerificationCode::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expired_at' => Carbon::now()->addMinutes(10)
        ]);
    }
}
