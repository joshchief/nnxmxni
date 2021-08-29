<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Str;
use Mail;

class RegisterController extends Controller
{
    // show register form 
    public function signupForm()
    {
        return view('auth.register');
    }

    // create & store new user
    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)
                                                            ->mixedCase()
                                                            ->symbols()  
                                                            ->numbers()
                                                            ->uncompromised()
                        ],
            'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect('/login')->with('info', 'Kindly click the link sent to your email');
    }




    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();
        
        if(isset($verifiedUser)){

            $user = $verifiedUser->user;

            if(!$user->email_verified_at){

                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect('login')
                                ->with('success', 'Email verification done');
            } else {
                return redirect()->back()
                                ->with('info', 'Email has already been verified');
            }

        } else {
            return redirect('login')
                        ->with('error', 'Something went wrong'); 
        }
    }
    
}
