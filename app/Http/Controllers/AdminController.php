<?php

namespace App\Http\Controllers;


use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function AdminLogin(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin2FA(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            /**generate verification code*/
            $verificationCode = mt_rand(100000, 999999); //random_int

            session(['verification_code' => $verificationCode , 'user_id' => $user->id]);

            //Send the data to VerificationMailCode
            Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

            //Authenticated user logout
            Auth::logout();

            return redirect()
                ->route('custom.verification.form')
                ->with('status' , 'Verification code has been sent to your email.');
        }

        return  redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function ShowVerification()
    {
        return view('auth.verify');
    }

    public function VerificationVerify(Request $request)
    {
       // return 'done';
        /*validation*/

        $request->validate(['code' => 'required|numeric']);

        if ($request->code == session('verification_code') ) {   //$request->session()->get('verificationCode')

                Auth::loginUsingId(session('user_id'));

                /**remove*/
            session()->forget(['verification_code' ,'user_id']);

            return redirect()->intended('/dashboard');
        }
            return  back()->withErrors(['code' => 'Invalid verification code.']);
    }
}
