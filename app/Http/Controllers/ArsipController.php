<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use App\Models\ModelLetter;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
    public function index(){
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();

        $data['letter'] = ArsipModel::select('surat.*', 'arsip.tanggal_arsip','keterangan','tbl_users.role', 'tbl_users.id as id_users', 'full_name', 'instansi.nama_instansi')->leftJoin("surat",'arsip.id_surat','=','surat.id')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
        ->leftJoin('instansi', 'surat.id_instansi', '=', 'instansi.id')->paginate(10);
        $i = 1;

        foreach ($data['users'] as $user) {
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }
        }
        foreach ($data['letter'] as $letter) {
            $letter->no = $i;
            if ($letter->role == 0) {
                $letter->role = "Admin";
            }
            if ($letter->role == 1) {
                $letter->role = "Waka Kesiswaan";
            }

            if ($letter->role == 2) {
                $letter->role = "Waka Kurikulum";
            }

            if ($letter->role == 3) {
                $letter->role = "Waka Hubin";
            }
            $i++;
        }
        return view("arsip_surat",$data);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            '*'=>'required'
        ]);
        if($validate->fails()){
            //error message
        }
        ArsipModel::create($request->all());

        return redirect()->back();
    }

 
}
