<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function __construct(){ 

    }
    public function index(){
        if(!Auth::check()){
            return view('auth.auth');
        }
        return redirect('/');
       
    }
    public function auth(Request $request){
        $credential = $request->validate([
            'email' => ['required','email'],
            'password'  => ['required']
        ]);
        $remember = false;
        if(isset($request['remember-me']) ){
            $remember = true;
        }
        if(Auth::attempt($credential,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect()->back()->with('error',"Email Or Password Incorrect")->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
