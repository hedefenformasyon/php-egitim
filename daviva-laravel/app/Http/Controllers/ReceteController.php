<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceteController extends Controller
{
    public function index()
    {
        return view('receteler');
    }
}
