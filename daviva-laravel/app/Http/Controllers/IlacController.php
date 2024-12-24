<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IlacController extends Controller
{
    public function index()
    {
        return view('ilaclar');
    }
}
