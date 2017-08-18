<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('staff');
    }


    public function index($page) {

        // Session Page
        session()->forget('staff_works');
        $staff_works = DB::table('rating_works')
            ->select()
            ->where('receive_id', Auth::id())
            ->where('status', '=', 'active')
            ->first();

        // Data found.
        if ($staff_works) {
            // Create array.
            $collect = array();
            foreach ($staff_works as $key => $value) {
                $collect[$key] = $value;
            }

            // Push to session.
            session()->push('staff_works', $collect);
        }



        // Get Works Data
        $works_list = DB::table('rating_works')
            ->select('id', 'tag', 'server', 'startRank', 'newRank', 'price')
            ->where('status', '=', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Works found.
        if ($works_list) {
            $collect_works = array();
            foreach ($works_list as $key => $value) {
                $collect_works[$key] = $value;
            }
        }










        switch ($page) {
            case 'dashboard':
                return view('staff._rating', compact('page'))->with(['collect_works'=>$collect_works]);
            break;

            default:
                return redirect('/staff/dashboard');
            break;
        }
    }
}
