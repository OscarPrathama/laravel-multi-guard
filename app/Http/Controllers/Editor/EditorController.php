<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Editor;
use Illuminate\Support\Facades\{Auth, Hash};

class EditorController extends Controller
{

    public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:editors,email',
            'status' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $editor = new Editor;
        $editor->name = $request->name;
        $editor->email = $request->email;
        $editor->status = $request->status;
        $editor->password = Hash::make($request->password);
        $is_saved = $editor->save();
        if($is_saved){
            return redirect()->back()->with('success', 'Editor created');
        }else{
            return redirect()->back()->with('fail', 'Register failed');
        }

    }

    public function check(Request $request){

        $request->validate(
            [
                'email' => 'required|email|exists:editors,email',
                'password' => 'required|min:5|max:30'
            ],
            [
                'email.exists' => 'This email is not exists on Editors table'
            ]
        );

        $creds = $request->only('email', 'password');
        if( Auth::guard('editor')->attempt($creds) ){
            return redirect()->route('editor.home');
        }else{
            return redirect()->route('editor.login')->with('fail', 'Login failed !');
        }

    }

    public function logout(){
        Auth::guard('editor')->logout();
        return redirect()->route('editor.login');
    }

}
