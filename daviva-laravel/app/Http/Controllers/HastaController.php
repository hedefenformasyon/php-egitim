<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HastaController extends Controller
{
    public function index()
    {
        return view('hastalar');
    }
}
