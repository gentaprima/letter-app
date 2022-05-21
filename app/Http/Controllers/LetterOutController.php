<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetterOutController extends Controller
{
    public function index(){
        return view('surat_keluar');
    }
}
