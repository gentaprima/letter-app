<?php

namespace App\Http\Controllers;

use App\Models\ModelInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    public function index(){
        $data['instance'] = ModelInstance::paginate(10);
        return view('instansi',$data);
    }

    public function store(Request $request){
        $validate = Validator::make($request->only('nama_instansi','alamat_instansi'),[
            'nama_instansi'=>'required',
            'alamat_instansi'=>'required',
        ]);
        if($validate->fails()){
            $request->session()->flash('issuccess', false);
            $request->session()->flash('message', $validate->errors()->first());
            return redirect("/dashboard/instansi");
        }
        ModelInstance::create($request->all());
        $request->session()->flash('issuccess', true);
        $request->session()->flash('message', "Data Instansi Behasil Ditambahkan");
        return redirect("/dashboard/instansi");
    }

    public function update(Request $request,$id){
        $data = ModelInstance::find($id);
        $data->update($request->all());
        return redirect("/dashboard/instansi");

    }
    public function destroy($id){
        $data = ModelInstance::find($id);
        $data->delete();
        return redirect("/dashboard/instansi");
    }
}
