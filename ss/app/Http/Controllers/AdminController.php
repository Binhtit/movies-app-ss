<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::check() )   {
            return redirect('admin/dashboard');
        }
        return view('pages.admins.login');
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/');
        }
    }

    public function dashboard(){
        if (!Auth::check()) {
            return redirect('admin/');
        }
        return view('pages.admins.dashboard')->with('username', Auth::user()->name);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/');
    }
}
