<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');

    }

    public function index()
    {
        return view('indexs.landing');
    }
}
