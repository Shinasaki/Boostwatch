<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class AjaxController extends Controller
{
    public function getRank($tag = "", $region = "")
    {
        if(empty($tag) || empty($region))
        {
            $tag = str_replace("#", "-", $_POST['tag']);
            $region = $_POST['region'];
        }
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

    public function compileRank($currentRank = 0, $newRank = 0)
    {
        if($currentRank == 0 || $newRank == 0)
        {
            $currentRank = $_POST['currentRank'];
            $newRank = $_POST['newRank'];
        }

        $priceSilver = 1;
        $priceGold = 1.3;
        $pricePlatinum = 2;
        $priceDiamond = 3;
        $priceMaster = 5;
        $priceGrand = 10;

        $currentRank = $currentRank;
        $newRank = $newRank;
        $price = $newRank - $currentRank;
        //Bronze
        if ($currentRank <= 1499)
        {
            if ($newRank <= 1499)
            {
                //to Bronze
                $price = $price * $priceBronze;
            }
            else if ($newRank <= 1999)
            {
                //to Silver
                $price = $price * $priceSilver;
            }
            else if ($newRank <= 2499)
            {
                //to Gold
                $price = $price * $priceGold;
            }
            else if ($newRank <= 2999)
            {
                //to Platinum
                $price = $price * $pricePlatinum;
            }
            else if ($newRank <= 3499)
            {
                //to Diamond
                $price = $price * $priceDiamond;
            }
            else if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Silver
        else if ($currentRank <= 1999)
        {
            if ($newRank <= 1999)
            {
                //to Silver
                $price = $price * $priceSilver;
            }
            else if ($newRank <= 2499)
            {
                //to Gold
                $price = $price * $priceGold;
            }
            else if ($newRank <= 2999)
            {
                //to Platinum
                $price = $price * $pricePlatinum;
            }
            else if ($newRank <= 3499)
            {
                //to Diamond
                $price = $price * $priceDiamond;
            }
            else if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Gold
        else if ($currentRank <= 2499)
        {
            if ($newRank <= 2499)
            {
                //to Gold
                $price = $price * $priceGold;
            }
            else if ($newRank <= 2999)
            {
                //to Platinum
                $price = $price * $pricePlatinum;
            }
            else if ($newRank <= 3499)
            {
                //to Diamond
                $price = $price * $priceDiamond;
            }
            else if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Platinum
        else if ($currentRank <= 2999)
        {
            if ($newRank <= 2999)
            {
                //to Platinum
                $price = $price * $pricePlatinum;
            }
            else if ($newRank <= 3499)
            {
                //to Diamond
                $price = $price * $priceDiamond;
            }
            else if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Diamond
        else if ($currentRank <= 3499)
        {
            if ($newRank <= 3499)
            {
                //to Diamond
                $price = $price * $priceDiamond;
            }
            else if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Master
        else if ($currentRank <= 3999)
        {
            if ($newRank <= 3999)
            {
                //to Master
                $price = $price * $priceMaster;
            }
            else if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        //Grand
        else if ($currentRank >= 4000)
        {
            if ($newRank >= 4000)
            {
                //to Grand
                $price = $price * $priceGrand;
            }
        }

        if(Cookie::get('Locale') == "en")
        {
            $price = $price / 32.5;
        }
        return round($price);
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
}
