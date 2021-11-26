<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
           'password' => 'required|min:6',
        ]);
        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();
        if($user->email_verified == 1){

            if (Auth::attempt($credentials)) {

                     $user = auth()->user();

                     $user->last_login = Carbon::now();

                     $user->save();

                     return redirect()->route('home');

                }

            }

            session()->flash('message', 'Invalid Credentials');

            session()->flash('type', 'danger');

            return redirect()->back();
    }
}
