<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{

    public function login() {
        if (Auth::check()) {
            return redirect('home_user');
        } else {
            return view('login.login');
        }
    }

    public function actionLogin(Request $request){
        
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->active) {
                // Check if the logged-in user is an admin
                if ($user->username == 'admin') {
                    return redirect('home_admin');
                } else {
                    return redirect('home_user');
                }
            } else {
                Auth::logout();
                Session::flash('error', 'Akun Anda belum diverifikasi. Silahkan cek email Anda.');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect('/');
        }  
    }
    
    public function actionLogout() {
        Auth::logout();
        return redirect('/');
    }
}
