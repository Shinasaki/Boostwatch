<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use DB;
use App;
use Auth;
use Crypt;
use Session;
use Cookie;
use App\Models\Works;
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
        if (session()->has('works')) {
            session()->forget('works');
            Works::ratingDel(Auth::id());
        } else {
            Works::ratingDel(Auth::id());
        }
        # Get post to variable
        $tag = $_POST['tag'];
        $server = $_POST['server'];
        $newRank = $_POST['newRank'];
        $currentRank = (new AjaxController) -> getRank($tag, $server);
        $price = (new AjaxController) -> compileRank($currentRank, $newRank);
        $bnet_email = $_POST['bnet_email'];
        $bnet_pass = Crypt::encrypt($_POST['bnet_pass']);
        $user_id = Auth::id();
        $currency = Cookie::get('Locale');

        # Push to database
        Works::ratingPush([
            'tag' => $tag,
            'server' =>$server,
            'currentRank' => $currentRank,
            'newRank' => $newRank,
            'price' => $price,
            'currency' => $currency,
            'bnet_email' => $bnet_email,
            'bnet_pass' => $bnet_pass,
            'user_id' => $user_id,
        ]);

        # Get id from last push
        $id = DB::getPdo()->lastInsertId();

        # Create Session
        session()->push(
            'works', array(
                'user_id' => $user_id,
                'work_id' => $id,
                'tag' => $tag,
                'server' => $server,
                'newRank' => $newRank,
                'currentRank' => $currentRank,
                'price' => $price
            ));
        # Redirect to Checkout
        return redirect("/checkout");
    }

    // Check you has work
    public function checkout()
    {
        if (!session()->has('works'))
        {
            return redirect("/boost");
        }
        else
        {
            return view('payment.payment');
        }
    }

    // Remove waiting Payment(Session)
    public function cancel($id = "")
    {
        session()->forget('works');
        Works::ratingDel(Auth::id());
        return redirect('/boost');
    }
}
