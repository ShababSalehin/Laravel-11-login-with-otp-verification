<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {

        // validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match the Old Password
        if(Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't Match!");
        }

        //Update the New Password
        User::whereId(auth()->user()->id)->update([
            'password' =>  Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password Changed Successfully!");

    }


}
