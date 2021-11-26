<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class VerifyController extends Controller
{

    public function VerifyEmail($token)
    {
    	if($token == null) {

    		session()->flash('message', 'Invalid Login attempt');

    		return redirect()->route('log');

    	}

       $user = User::where('email_verification_token',$token)->first();

       if($user == null ){

       	session()->flash('message', 'Invalid Login attempt');

        return redirect()->route('log');

       }


        $user->email_verified = 1;
        $user->email_verified_at = Carbon::now();
        $user->email_verification_token ='';
        $user->update();



       	session()->flash('message', 'Your account is activated, you can log in now');

        return redirect()->route('log');

    }
}
