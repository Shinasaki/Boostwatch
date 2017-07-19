<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('member');
    }
    public function index()
    {
        return view('dashboard.index');
    }

}
