<?php

namespace App\Http\Controllers;

use App\Models\ModelInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    public function index(){
        $data['instance'] = ModelInstance::where('nama_instansi','!=',"SMK Teratai Putih Global 2 Bekasi")->paginate(10);
        return view('instansi',$data);
    }

    public function store(Request $request){
        $validate = Validator::make($request->only('nama_instansi','alamat_instansi'),[
            'nama_instansi'=>'required',
            'alamat_instansi'=>'required',
        ]);
        if($validate->fails()){
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'Warning');
            $request->session()->flash('message', $validate->errors()->first());
            return redirect("/dashboard/instansi");
        }
        ModelInstance::create($request->all());

        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', "Berhasil Menambahkan Instansi");
        return redirect("/dashboard/instansi");
    }

    public function update(Request $request,$id){
        $validate = Validator::make($request->only('nama_instansi','alamat_instansi'),[
            'nama_instansi'=>'required',
            'alamat_instansi'=>'required',
        ]);
        if($validate->fails()){
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'Warning');
            $request->session()->flash('message', $validate->errors()->first());
            return redirect("/dashboard/instansi");
        }
        $data = ModelInstance::find($id);
        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', "Berhasil Edit Instansi");
        $data->update($request->all());
        return redirect()->back();

    }
    public function destroy($id){
        $data = ModelInstance::find($id);
        $data->delete();
        Session::flash('icon', 'success');
        Session::flash('title', 'Success');
        Session::flash('message', "Berhasil Menghapus Instansi");
        return redirect("/dashboard/instansi");
    }
}
