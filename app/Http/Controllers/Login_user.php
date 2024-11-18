<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login_user extends Controller
{
    public function login_view(){
        if (Auth::guard('client')->check()) {
            return back()->with('success','Already Logged in');
        }
        return view('restu.login_user');
    }

    public function register_view(){
        if (Auth::guard('client')->check()) {
            return back()->with('success','Logged in. Logout First');
        }
        return view('restu.register_user');
    }

    public function loginPost(Request $request){
    // Validate input fields
    $request->validate([
        'mail' => 'required|email',
        'pass' => 'required',
    ]);

    // Credentials for authentication
    $credentials = [
        'email' => $request->mail,
        'password' => $request->pass,
    ];

    // Attempt client authentication
    if (Auth::guard('client')->attempt($credentials)) {
        $request->session()->put('user_mail', $credentials['email']); // Store client email in session
        return redirect('/')->with('success', 'Logged in successfully');
    }

    // If authentication fails
    return back()->with('error', 'Email or Password incorrect');
    }

    public function registerPost(Request $request){
        $user = new Client();
        $user->email = $request->mail;
        $user->password = Hash::make($request->pass);
        $user->save();
        return redirect('/login_user')->with('success', 'Registerd in successfully'); 
    }

    public function logout(Request $request) {
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout(); // Logout the client
            $request->session()->forget('user_mail');
            return redirect('/'); // Remove client email from the session
        }
    }
}



