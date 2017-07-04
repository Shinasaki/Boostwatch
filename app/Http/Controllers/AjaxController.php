<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getRank()
    {
        $tag = str_replace("#", "-", $_POST['tag']);
        $region = $_POST['region'];
        $sh = curl_init();
        $url = "https://playoverwatch.com/en-us/career/pc/".$region."/".$tag;

        curl_setopt($sh, CURLOPT_URL, $url);
        curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sh, CURLOPT_HEADER, false);

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
            echo $node -> nodeValue;
        }
        else
        {
            echo "0";
        }
    }
}
