<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $random = Str::random(40);
        $user = new User();

        $user-> name = trim($request->input('name'));
        $user-> email = strtolower($request->input('email'));
        $user->password = bcrypt($request->input('password'));
        $user->email_verification_token = $random;
        $user->save();

        Mail::to($user->email)->send(new VerificationEmail($user));

        session()->flash('message', 'Please check your email to activate your account');

        return redirect()->back();
    }
}
