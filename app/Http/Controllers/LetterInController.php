<?php

namespace App\Http\Controllers;

use App\Models\ModelInstance;
use App\Models\ModelLetter;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LetterInController extends Controller
{
    public function index(){
        $data['letter'] = ModelLetter::select('surat.*','tbl_users.role','tbl_users.id as id_users','full_name','instansi.nama_instansi')->leftJoin('tbl_users','surat.id_users','=','tbl_users.id')
        ->leftJoin('instansi','surat.id_instansi','=','instansi.id')->where('type','0')->get();
        $i = 1;
        foreach($data['letter'] as $letter){
            $letter->no = $i;
            if($letter->role == 0){
                $letter->role = "Admin";
            }
            if($letter->role == 1){
                $letter->role = "Waka Kesiswaan";
            }

            if($letter->role == 2){
                $letter->role = "Waka Kurikulum";
            }

            if($letter->role == 3){
                $letter->role = "Waka Hubin";
            }
            $i++;
        }
        return view('surat_masuk',$data);
    }

    public function add(){
        $data['instance']= ModelInstance::select('id','nama_instansi')->get();
        $data['users']=ModelUsers::select('id','full_name','role')->get();
        foreach($data['users'] as $user){
            if($user->role == 0){
                $user->role = "Admin";
            }
            if($user->role == 1){
                $user->role = "Waka Kesiswaan";
            }

            if($user->role == 2){
                $user->role = "Waka Kurikulum";
            }

            if($user->role == 3){
                $user->role = "Waka Hubin";
            }
        }
        return view('add_surat',$data);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            '*' => 'required',     
        ]);

        if($validate->fails()){
            $request->session()->flash('issuccess', false);
            $request->session()->flash('message', $validate->errors()->first());
        }
        ModelLetter::create($request->all());
        return redirect()->back();
    }



    public function update(Request $request,$id){

    }

    public function destroy($id){        
        $letter = ModelLetter::find($id);
        $letter->delete();
        Session::flash('message', 'Data Pengguna berhasil dihapus.'); 
        Session::flash('icon', 'success'); 
        return redirect()->back();
    }
}
