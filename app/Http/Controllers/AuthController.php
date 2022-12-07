<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $validator = $request->validate(
            [
            'email' => 'required|email',
            'password' => 'required'
            ],
            [
                'email.required' => 'O campo e-mail precisa ser preenchido',
                'email.email' => 'O formato inserido não é válido',
                'password.required' => 'O campo senha precisa ser preenchido'
            ]
    );

       if(!Auth::attempt($validator)){
                return redirect('login')
                ->withErrors("E-mail ou senha incorretos")
                ->withInput();
            
       }

       $request->session()->regenerate();
    
       return redirect()->intended('home');
       
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $request['password'] = Hash::make($request->password);
        
        $data = $request->only('name', 'email', 'password');
        User::create($data);

        return redirect(route('login'));
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
