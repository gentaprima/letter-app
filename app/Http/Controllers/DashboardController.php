<?php

namespace App\Http\Controllers;

use App\Models\ModelInstance;
use App\Models\ModelLetter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['letterOut'] = ModelLetter::where('type', '1');
        if (session("users")['role'] !== 0 && session("users")['role'] !== 4) {
            $data['letterOut'] = $data['letter']->where('id_users', session("users")['id']);
        }
        $data['letterIn'] = ModelLetter::where('type', '0');
        if (session("users")['role'] !== 0 && session("users")['role'] !== 4) {
            $data['letterIn'] = $data['letter']->where('id_users', session("users")['id']);
        }
    
        $data['letterOut'] = $data['letterOut']->count();
        $data['letterIn'] = $data['letterIn']->count();
        $data['instance'] = ModelInstance::count();
        return view("dashboard", $data);
    }
}
