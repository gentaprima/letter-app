<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use App\Models\EvaluationLetter;
use App\Models\ModelInstance;
use App\Models\ModelLetter;
use App\Models\ModelUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index($type)
    {
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name', 'instansi.nama_instansi')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
            ->leftJoin('instansi', 'surat.id_instansi', '=', 'instansi.id')->where('type', $type);
        if(session("users")['role'] !== 0){
            $data['letter'] = $data['letter']->where('id_users',session("users")['id']);
        }
        $data['letter'] = $data['letter']->get();
        $i = 1;
        if($type == 0){
            $data['title'] = "Data Surat Masuk";
        }else{
            $data['title'] = "Data Surat Keluar";
        }
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
            if($user->role == 4){
                $user->role = "Kepala Sekolah";
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
            if($user->role == 4){
                $user->role = "Kepala Sekolah";
            }
            $i++;
        }
        return view('surat_masuk', $data);
    }

    public function add($type)
    {
        $data['instance'] = ModelInstance::select('id', 'nama_instansi')->get();
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        if($type == 0){
            $data['title'] = "Tambah Surat Masuk";
        }else{
            $data['title'] = "Tambah Surat Keluar";
        }
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
            if($user->role == 4){
                $user->role = "Kepala Sekolah";
            }
        }
        return view('add_surat', $data);
    }
    public function store(Request $request,$type)
    {
        $validate = Validator::make($request->all(), [
            '*' => 'required',
        ]);

        if ($validate->fails()) {
            $request->session()->flash('issuccess', false);
            $request->session()->flash('message', $validate->errors()->first());
        }
        $file =$request->file('foto_lampiran');
        $fileNames = "";
        foreach($file as $f){
            $name = uniqid().".jpg";
            Storage::disk("local")->put("public/".$name,file_get_contents($f));
            $fileNames.= $name.",";
        }
        $input = $request->all();
        $input['is_arsip'] = true;
        $input['type'] = $type;
        $input['foto_lampiran'] = substr($fileNames,0,strlen($fileNames) - 1);
        ModelLetter::create($input);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $letter = ModelLetter::find($id);
        $letter->delete();
        Session::flash('message', 'Data Pengguna berhasil dihapus.');
        Session::flash('icon', 'success');
        return redirect()->back();
    }

    public function show($id,$type){
        $data['letter'] =   $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name', 'instansi.nama_instansi')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
        ->leftJoin('instansi', 'surat.id_instansi', '=', 'instansi.id')->where('type', $type)->find($id);
        $data['letter']->foto_lampiran = explode(',',$data['letter']->foto_lampiran);
        $data['instance'] = ModelInstance::select('id', 'nama_instansi')->get();
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        $data['isArsip'] = ArsipModel::where('id_surat',$id)->count() > 0 ? false : true;
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

            if($user->role == 4){
                $user->role = "Kepala Sekolah";
            }
        }
        return view('detail_surat',$data);
    }

    public function disposisi(Request $request,$id){
        $data = ModelLetter::find($id);
        $data->update([
            'id_users'=>$request->id_users,
        ]);
       EvaluationLetter::create([
            'disposisi'=>$request->id_users,
            'tanggal'=>Carbon::now(),
            'evaluasi'=>$request->evaluasi,
            'tindak_lanjut'=>$request->tindak_lanjut
        ]);
        return redirect()->back();
    }
}
