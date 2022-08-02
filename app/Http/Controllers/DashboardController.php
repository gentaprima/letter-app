<?php

namespace App\Http\Controllers;

use App\Models\EvaluationLetter;
use App\Models\ModelInstance;
use App\Models\ModelLetter;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['letterOut'] = ModelLetter::where('type', '1');
        if (session("users")['role'] !== 0 && session("users")['role'] !== 4) {
            $data['letterOut'] = $data['letterOut']->where('id_users', session("users")['id']);
        }
        $data['letterIn'] = ModelLetter::where('type', '0');
        if (session("users")['role'] !== 0 && session("users")['role'] !== 4) {
            $data['letterIn'] = $data['letterIn']->where('id_users', session("users")['id']);
        }
        $data['countResponse'] = EvaluationLetter::where("response", '!=', null)->count();
        $data['letterOut'] = $data['letterOut']->count();
        $data['letterIn'] = $data['letterIn']->count();
        $data['dispos'] = EvaluationLetter::where("is_approve", '=', 1)->distinct()->count("id_surat");
        $data['outLetterApprove'] = DB::table("surat")->where("type",'=','1')->where("is_out_letter_approve",'1')->get()->count();
        // dd($data['outLetterApprove']);

        return view("dashboard", $data);
    }
}
