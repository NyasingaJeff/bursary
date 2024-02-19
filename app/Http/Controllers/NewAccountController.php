<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NewAccountController extends Controller
{
    //
    public function newUSerAccount(User $user, $token)
    {
        $newUser = $user->newUSerAccount($token);
        # code...
        if ($newUser) {
            return view('auth.passwordSetting')->with("newUser",$newUser);
        } else {
            return view('auth.expiredLink');
        }  
        
    }
}
