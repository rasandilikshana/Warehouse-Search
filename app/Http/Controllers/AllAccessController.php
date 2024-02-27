<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllAccessController extends Controller
{
    public function index(){
        return view('allaccess-home');
    }
}
