<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use App\Models\ModelLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            '*'=>'required'
        ]);
        $letter = ModelLetter::find($request->id_surat);
        if($letter->is_arsip){
            //sudah diarsip validate
            return redirect()->back();
        }
        if($validate->fails()){
            //error message
        }
        $letter->update([
            'is_arsip'=>true
        ]);
        ArsipModel::create($request->all());

        return redirect()->back();
    }
}
