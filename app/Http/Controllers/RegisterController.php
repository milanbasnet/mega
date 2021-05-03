<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $store= new User();
        $store->name=$request->name;
        $store->email=$request->email;
        $store->password=Hash::make($request->password);
        $store->save();
        Auth::attempt($request->only('email','password'));
        return redirect()->route('home');
    }
    public function logoutFunction(){
        Auth::logout();
        return back();
    }

    public function loginindex(){
        return view('auth.login');
    }
    public function loginStore(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ]);
        $loginStore= new User();
        $loginStore->email=$request->email;
        $loginStore->password=$request->password;

       if (Auth::attempt($request->only('email', 'password'))) {
           return redirect()->route('home');
       }
       else return back();
    }
}

