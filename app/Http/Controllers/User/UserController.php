<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\{Auth, Hash};

class UserController extends Controller
{
    public function create(Request $request){
        // validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return redirect()->back()->with('success', 'You\'re now registered');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong, fail to register');
        }
    }

    public function check(Request $request){
        // validate input
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:5|max:30'
            ],
            [
                'email.exists' => 'This email is not exists on users table'
            ]
        );

        // just get email & password form input data
        $creds = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
