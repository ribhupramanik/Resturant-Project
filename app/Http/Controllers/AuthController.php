<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        if (Auth::guard('admin')->check()) {
            return redirect('/home');
        }
        return view('login');
    }

    public function register(){
        if (Auth::guard('admin')->check()) {
            return redirect('/home');
        }
        return view('register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->email = $request->mail;
        $user->password = Hash::make($request->pass);
        $user->save();
        return back()->with('success','Register Successful'); 
    }

    public function loginPost(Request $request){
       $credentials = [
        'email' => $request->mail,
        'password' => $request->pass,
       ];

       if (Auth::guard('admin')->attempt($credentials)){
        $request->session()->put('admin_mail',$credentials['email']);
        return redirect('/home')->with('Success','Loged in');
       }

       return back()->with('error','Email or Passsword incorrect');
    }

    public function logout(Request $request) {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout(); // Logout the admin
            $request->session()->forget('admin_mail');
            return redirect('/');
      }
    }

}
