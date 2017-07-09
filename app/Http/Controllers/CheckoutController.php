<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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

        echo "Tag: " .$tag. "Server: " .$server. "NewRank: " .$newRank. "CurrentRank: " .$currentRank. "Price: " .$price;
    }
}
