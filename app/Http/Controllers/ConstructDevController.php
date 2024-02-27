<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstructDevController extends Controller
{
    public function index(){
        return view('construct-dev-home');
    }
}
