<?php

namespace App\Http\Controllers;

use App\Models\ModelLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LetterInController extends Controller
{
    public function index(){
        $data['letter'] = ModelLetter::where('type',0)->paginate(10);
        return view('surat_masuk',$data);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            
        ]);
    }

    public function update(Request $request,$id){

    }

    public function destroy($id){

    }
}
