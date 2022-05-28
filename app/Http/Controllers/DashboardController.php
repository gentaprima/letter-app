<?php

namespace App\Http\Controllers;

use App\Models\ModelInstance;
use App\Models\ModelLetter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['letterIn'] = ModelLetter::where("type",0)->where('id_users',session("users")->id)->count();
        $data['letterOut'] = ModelLetter::where("type",1)->where('id_users',session("users")->id)->count();
        $data['instance'] = ModelInstance::count();
        return view("dashboard",$data);
    }
}
