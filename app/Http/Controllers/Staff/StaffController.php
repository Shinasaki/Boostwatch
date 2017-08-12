<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('member');
    }


    public function index($page) {
        switch ($page) {
            case 'dashboard':
                return view('staff._rating', compact('page'));
            break;

            default:
                return redirect('/staff/dashboard');
            break;
        }
    }
}
