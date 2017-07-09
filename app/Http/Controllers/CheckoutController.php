<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use DB;
use App;
use Auth;
use Crypt;
use Session;
use App\Models\WorkModel;

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

        WorkModel::WorksPush([
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
        session(['work_tag' => $id]);
        return redirect("/payment");
    }

}
