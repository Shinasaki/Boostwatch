<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BoostController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
    }


    public function index()
    {
        return redirect('/boost/rating');
    }
    public function boost($page)
    {
        switch ($page) {
            case 'rating':
                return view('boost._rating', compact('page'));
            break;
            case 'duo':

                //ยังไม่เปิด
                return redirect('/boost/rating');
                //return view('boost._duo', compact('page'));

            break;
            case 'placment':

                //ยังไม่เปิด
                return redirect('/boost/rating');
                //return view('boost._placment', compact('page'));

            break;
            case 'leveling':
                return view('boost._leveling', compact('page'));
            break;

            default:
                return redirect('/');
            break;
        }
    }
}
