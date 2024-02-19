<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class PasswordChangeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


     public function changePassword(Request $request)
     {
         
        if (!(Hash::check($request->get('oldPassword'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:6',
            'newPasswordConf'=>'required|same:newPassword'
        ]);

        //Change Password
        $user = auth()->user();
        $user->password = Hash::make($request->get('newPassword'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
     }
}
