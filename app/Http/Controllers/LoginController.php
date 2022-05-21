<?php

namespace App\Http\Controllers;

use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            $request->session()->flash('islogin', false);
            $request->session()->flash('message', $validate->errors()->first());
            return redirect("/");
        }
        $check = ModelUsers::where('email', $request->email)->first();
        if (!$check) {
            $request->session()->flash('islogin', false);
            $request->session()->flash('message', "Akun tidak ditemukan");
            return redirect("/");
        }
        $check =  Hash::check($request->password, $check->password);
        if ($check) {
            session(['key' => $check]);
            return redirect("/dashboard/beranda");
        }
        $request->session()->flash('islogin', false);
        $request->session()->flash('message', 'Username dan password tidak sesuai,silahkan coba lagi');
        return redirect("/");
    }
}
