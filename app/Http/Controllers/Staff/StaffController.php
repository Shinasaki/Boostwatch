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
