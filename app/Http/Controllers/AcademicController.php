<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index(Request $request){
        return view('academic-home');
    }
}
