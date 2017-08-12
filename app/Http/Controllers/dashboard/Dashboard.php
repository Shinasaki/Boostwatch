<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AjaxController;
use DB;
use Auth;
use Cookie;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('member');
    }

    public function index($page)
    {
        // Check has Boosting
        session()->forget('progress');
        $progress = DB::table('rating_works')
            ->select('id', 'user_id', 'tag', 'startRank', 'startRank', 'currentRank', 'newRank', 'price', 'currency', 'server')
            ->where('user_id', Auth::id())
            ->where('status', '=', 'active')
            ->orderBy('created_at', 'desc')
            ->first();
        if ($progress != null) {
            // Convert data to array
            $collect = array();
            foreach ($progress as $key => $value) {
                $collect[$key] = $value;

            }

            // Progress
            $prog_max = $progress->newRank - $progress->startRank;
            $prog_current = $progress->newRank - $progress->currentRank;
            $prog_result = round(100 - (($prog_current * 100) / $prog_max));
            if ($prog_result < 0) {
                $prog_result = 0;
            }
            elseif ($prog_result > 100) {
                $prog_result = 100;
            }
            $collect['percent'] = $prog_result;

            // Push to session
            session()->push('progress', $collect);
        }

        // Update Rank
        //AjaxController::getRank(session('progress')[0]['tag'], session('progress')[0]['server']);



        // Route Dashboard
        switch ($page) {
            case 'rating':
                return view('dashboard._rating', compact('page'));
            break;
            case 'duo':

                //ยังไม่เปิด
                return redirect('/dashboard/rating');
                //return view('dashboard._duo', compact('page'));

            break;
            case 'placment':

                //ยังไม่เปิด
                return redirect('/dashboard/rating');
                //return view('dashboard._placment', compact('page'));

            break;
            case 'level':
                return view('dashboard._level', compact('page'));
            break;

            default:
                return redirect('/dashboard/rating');
            break;
        }
    }

}
?>
