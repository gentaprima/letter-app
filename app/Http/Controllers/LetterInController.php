<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetterInController extends Controller
{
    public function index(){
        return view('surat_masuk');
    }
}
