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
    public function login()
    {
        if ( Auth::check() )   {
            return redirect('admin/dashboard');
        }
        return view('pages.admins.login');
    }

    public function dashboard(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return view('pages.admins.dashboard');
        } else {
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
