<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use DB;
use App;
use Auth;
use Crypt;
use Session;
use App\Models\Checkout;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('member');
    }

    public function rating()
    {
        $tag = $_POST['tag'];
        $server = $_POST['server'];
        $newRank = $_POST['newRank'];
        $currentRank = (new AjaxController) -> getRank($tag, $server);
        $price = (new AjaxController) -> compileRank($currentRank, $newRank);
        $bnet_email = $_POST['bnet_email'];
        $bnet_pass = Crypt::encrypt($_POST['bnet_pass']);
        $user_id = Auth::id();

        Checkout::PushWork([
            'tag' => $tag,
            'server' =>$server,
            'currentRank' => $currentRank,
            'newRank' => $newRank,
            'price' => $price,
            'bnet_email' => $bnet_email,
            'bnet_pass' => $bnet_pass,
            'user_id' => $user_id,
        ]);
        $id = DB::getPdo()->lastInsertId();

        if (session()->has('work_id')) {
            session()->push('work_id', $id);
        } else {
            session(['work_id' => array($id)]);
        }
        print_r(session('work_id'));
        return redirect("/checkout");
    }

    public function checkout()
    {
        if (!session()->has('work_id'))
        {
            return redirect("/boost");
        }
        else
        {
            return view('payment.payment');
        }
    }

    public function cancel($id = "")
    {
        $value = session()->get('work_id');
        if (($key = array_search($id, $value)) !== false) {
            unset($value[$key]);
        }

        session()->forget('work_id');

        foreach ($value as $data) {
            session()->push('work_id', $data);
        }

        return redirect()->back();
    }
}
