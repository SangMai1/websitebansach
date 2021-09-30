<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginadmin()
    {
        return view("/loginadmin");
    }

    public function check(Request $request)
    {
        $data = [
        'email' => $request->email,
        'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            session()->put("username", Auth::user()->name);
            return redirect()->route("books.list");
        }
        
        return redirect()->back();
    }

    public function get_logout_admin()
    {
        session()->flush();
        Auth::logout();
        return redirect('/api/loginadmin');
    }
}
