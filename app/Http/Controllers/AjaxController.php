<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Cookie;
use Session;
use Auth;
use DB;

class AjaxController extends Controller
{

    public static function getRank($tag = "", $region = "")
    {
        if(isset($_POST['tag']) && isset($_POST['region']))
        {
            $tag = $_POST['tag'];
            $region = $_POST['region'];
        }

        $tag = str_replace("#", "-", $tag);
        $sh = curl_init();
        $url = "https://playoverwatch.com/en-us/career/pc/".$region."/".$tag;

        curl_setopt($sh, CURLOPT_URL, $url);
        curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sh, CURLOPT_HEADER, false);
        curl_setopt($sh, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($sh);
        curl_close($sh);

        $start = stripos($result, "<body");
        $end = stripos($result, "</body");
        $body = substr($result, $start, $end-$start);

        $dom = new \DOMDocument();
        @$dom->loadHTML($body);

        $finder = new \DomXpath($dom);
        $classname = "competitive-rank";

        $nodes = $finder->query("//*[contains(@class, '$classname')]");

        foreach ($nodes as $node) {
        }

        if(!empty($node))
        {
            return $node -> nodeValue;
        }
        else
        {
            return "0";
        }
    }

    public function compileRank($currentSR= 0, $newSR = 0)
    {
        if($currentSR == 0 || $newSR == 0)
        {
            $currentSR = $_POST['currentRank'];
            $newSR = $_POST['newRank'];
        }

        /*                v Start Bronze Here */
        $rating = array(1,1,1,1,1,1.5,2.5,7,27,37);
        $price = 0;

        /*
            0000 - 1499 Bronze 1
            1500 - 1999 Silver 1
            2000 - 2499 Gold 1
            2500 - 2999 Platinum 1.5
            3000 - 3499 Diamond 2.5
            3500 - 3999 Master 7
            4000 + 5000 GrandMaster 27
        */


        /* Current Rank */
        $currentSplit = floor($currentSR / 500);
        $currentFraction = $currentSR - ($currentSplit * 500);


        /* New Rank */
        $newSplit = floor($newSR / 500);
        $newFraction = $newSR - ($newSplit * 500);


        # Start Fraction
        if ($newSR - $currentSR >= 500) {
            $currentFraction = 500;
            $price += $rating[$currentSplit] * $currentFraction;
            //echo $rating[$currentSplit] * $currentFraction . "[$rating[$currentSplit]] + ";
        }



        # Loop Split
        for ($i=$currentSplit+1; $i < $newSplit; $i++) {

            $currentFraction = 500;
            $price += $rating[$i] * $currentFraction;
        }


        # Last Fraction
        $price += $rating[$i] * $newFraction;
        return $price;
    }




    public function levelCompile()
    {
        $lootbox = 23;
        if(isset($_POST['level']) && !empty($_POST['level']))
        {
            $price = $_POST['level'] * $lootbox;
            if(Cookie::get('Locale') == "en")
            {
                $price = $price / 32.5;
            }
            return round($price);
        }
    }

    public function chat()
    {
        if(isset($_POST['msg']) && session()->has('progress')) {
            Chat::chatPush([
                'name' => session('progress')[0]['tag'],
                'message' => $_POST['msg'],
                'user_id' => session('progress')[0]['user_id'],
                'work_id' => session('progress')[0]['id'],
            ]);
            return 'success';
        }
    }
    public function chatMsg()
    {
        if (session()->has('progress')) {
            $Chat = DB::table('chat')
                ->where('work_id', '=', session('progress')[0]['id'])
                ->orderBy('created_at')
                ->get();
            return array($Chat, Auth::id());
        }
    }





    // Dashboard
    // - Reload
    public function progress_reload() {
        if(session()->has('progress'))
        {
            $tag = session('progress')[0]['tag'];
            $region = session('progress')[0]['server'];
            $currentRank = $this->getRank($tag, $region);
            DB::table('rating_works')
                -> where('tag', $tag)
                -> update(['currentRank' => $currentRank]);
        } else {
            return false;
        }
    }
}
