<?php

namespace App\Http\Controllers;

use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(){
        $dataPengguna = ModelUsers::all();
        $data = [
            'dataPengguna' => $dataPengguna
        ];
        return view('data-pengguna',$data);
    }

    public function profile(){
        return view('profile');
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'fullName'    => 'required',
            'email'    => 'required|email',
            'phoneNumber'    => 'required|numeric|min:11',
            'password'    => 'required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'    => 'required',
            'gender'           => 'required',
            'birthDate'           => 'required|date'

        ],[
            'fullName.required' => "Nama Lengkap harus dilengkapi",
            'email.required' => "Email harus dilengkapi",
            'password.required' => "Password harus dilengkapi",
            'confirmPassword.required' => "Konfirmasi Password harus dilengkapi",
            'phoneNumber.required'       => "Nomor telepon harus dilengkapi",
            'gender.required'       => "Jenis Kelamin harus dilengkapi",
            'phoneNumber.numeric'       => "Nomor telepon harus menggunakan angka",
            'password.confirmed'       => "Password dan Konfirmasi password harus sama",
        ]);

        if($validate->fails()){
            Session::flash('message', $validate->errors()->first()); 
            Session::flash('icon', 'error'); 
            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validate);
        }

        $checkEmail = ModelUsers::where('email',$request->email)->first();

        if($checkEmail != null){
            Session::flash('message', 'Maaf, Email sudah digunakan.'); 
            Session::flash('icon', 'error'); 
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
            'role' => 1,
        ]);
        $users->save();
        Session::flash('message', 'Pengguna baru berhasil ditambahkan.'); 
        Session::flash('icon', 'success'); 
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'fullName'    => 'required',
            'email'    => 'required|email',
            'phoneNumber'    => 'required|numeric|min:11',
            'gender'           => 'required',
            'birthDate'           => 'required|date'

        ],[
            'fullName.required' => "Nama Lengkap harus dilengkapi",
            'email.required' => "Email harus dilengkapi",
            'phoneNumber.required'       => "Nomor telepon harus dilengkapi",
            'gender.required'       => "Jenis Kelamin harus dilengkapi",
            'phoneNumber.numeric'       => "Nomor telepon harus menggunakan angka",
        ]);

        if($validate->fails()){
            Session::flash('message', $validate->errors()->first()); 
            Session::flash('icon', 'error'); 
            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validate);
        }

        $users = ModelUsers::find($id);
        if($request->password != null){
            if($request->password != $request->confirmPassword){
                Session::flash('message', 'Password dan Konfirmasi password harus sama.'); 
                Session::flash('icon', 'error'); 
                return redirect()->back();
            }
            $users->password = Hash::make($request->password);
            
        }

        $users->full_name = $request->fullName;
        $users->phone_number = $request->phoneNumber;
        $users->gender = $request->gender;
        $users->date_birth = $request->birthDate;
        $users->save();
        Session::flash('message', 'Data Pengguna berhasil diperbarui.'); 
        Session::flash('icon', 'success'); 
        return redirect()->back();
    }

    public function destroy($id){
        $users = ModelUsers::find($id);
        $users->delete();
        Session::flash('message', 'Data Pengguna berhasil dihapus.'); 
        Session::flash('icon', 'success'); 
        return redirect()->back();
    }
}
