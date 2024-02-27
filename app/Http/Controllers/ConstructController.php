<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstructController extends Controller
{
    public function index(){
        return view('construct-home');
    }
}
