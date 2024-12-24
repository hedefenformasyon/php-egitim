<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoktorController extends Controller
{
    public function index()
    {
        return view('doktorlar');
    }
}
