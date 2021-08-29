<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Carbon\Carbon;
use DB;
use Mail;

class PasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('auth.password.forgot-password');
    }

    public function submitForgotPassword(Request $request) 
    {
        // Validate Email
        $request->validate([
            'email' => 'required|email'
        ]);

        // Generate Token
        $token = Str::random(60);

        // Insert Email & Token in password_resets table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        // Send Mail with Token
        Mail::send('email.forgotPassword', ['token' => $token], function ($message) use ($request){
            $message->from('ushebaresourcesltd@gmail.com', 'nnxmxni');
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()
                ->with('info', 'We have emailed your password reset link');
    }








    public function showResetPassword($token)
    {
        return view('auth.password.reset-password', ['token' => $token]);
    }

    public function submitResetPassword(Request $request)
    {
       $request->validate([
           'email' => 'required|email',
           'password' => ['required', 'confirmed', Password::min(8)
                                                        ->mixedCase()
                                                        ->symbols()
                                                        ->numbers()
                                                        ->uncompromised()
                 ],
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where([
                'email' => $request->email,
                'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return back()
                    ->withInput()
                    ->with('error', 'Invalid Token');
        }

        $user = User::where('email', $request->email)
                                ->update([
                                    'password' => Hash::make($request->password)
                                ]);
        return redirect('/login')->with('success', 'Password Reset done!');
    }

}
