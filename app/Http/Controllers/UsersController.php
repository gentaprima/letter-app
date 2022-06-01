<?php

namespace App\Http\Controllers;

use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $dataPengguna = ModelUsers::paginate(10);
        $data = [
            'dataPengguna' => $dataPengguna
        ];
        return view('pengguna', $data);
    }

    public function profile()
    {
        return view('profile');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fullName'    => 'required',
            'email'    => 'required|email',
            'phoneNumber'    => 'required|numeric|min:11',
            'password'    => 'required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'    => 'required',
            'gender'           => 'required',
            'birthDate'           => 'required|date',
            'role' => 'required|in:0,1,2,3,4'

        ], [
            'fullName.required' => "Nama Lengkap harus dilengkapi",
            'email.required' => "Email harus dilengkapi",
            'password.required' => "Password harus dilengkapi",
            'confirmPassword.required' => "Konfirmasi Password harus dilengkapi",
            'phoneNumber.required'       => "Nomor telepon harus dilengkapi",
            'gender.required'       => "Jenis Kelamin harus dilengkapi",
            'phoneNumber.numeric'       => "Nomor telepon harus menggunakan angka",
            'password.confirmed'       => "Password dan Konfirmasi password harus sama",
        ]);
        if ($validate->fails()) {
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'Warning');
            $request->session()->flash('message', $validate->errors()->first());
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validate);
        }

        $checkEmail = ModelUsers::where('email', $request->email)->first();

        if ($checkEmail != null) {
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'Warning');
            $request->session()->flash('message', "Email Sudah Digunakan");
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validate);
        }

        $users = ModelUsers::create([
            'email' => $request->email,
            'full_name' => $request->fullName,
            'phone_number' => $request->phoneNumber,
            'gender' => $request->gender,
            'date_birth' => $request->birthDate,
            'password'  => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $users->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', "Berhasil Menambahkan Pengguna");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'fullName'    => 'required',
            'email'    => 'required|email',
            'phoneNumber'    => 'required|numeric|min:11',
            'gender'           => 'required',
            'birthDate'           => 'required|date',
            'role' => 'required'

        ], [
            'fullName.required' => "Nama Lengkap harus dilengkapi",
            'email.required' => "Email harus dilengkapi",
            'phoneNumber.required'       => "Nomor telepon harus dilengkapi",
            'gender.required'       => "Jenis Kelamin harus dilengkapi",
            'phoneNumber.numeric'       => "Nomor telepon harus menggunakan angka",
        ]);

        if ($validate->fails()) {
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'Warning');
            $request->session()->flash('message', $validate->errors()->first());
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validate);
        }

        $users = ModelUsers::find($id);
        if ($request->password != null) {
            if ($request->password != $request->confirmPassword) {
                $request->session()->flash('icon', 'warning');
                $request->session()->flash('title', 'Warning');
                $request->session()->flash('message', "Password dan Konfirmasi password harus sama.");
                return redirect()->back();
            }
            $users->password = Hash::make($request->password);
        }

        $users->full_name = $request->fullName;
        $users->phone_number = $request->phoneNumber;
        $users->gender = $request->gender;
        $users->date_birth = $request->birthDate;
        $users->save();
        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', "Data Pengguna Berhasil Diperbaharui.");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $users = ModelUsers::find($id);
        $users->delete();
        Session::flash('icon', 'success');
        Session::flash('title', 'Success');
        Session::flash('message', "Data Pengguna berhasil dihapus.");
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('users');
        
    }
}
