<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(Request $request)
    {
        return view('editor-home');
    }
}
