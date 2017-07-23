<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Works extends Model
{
    protected $table = 'rating_works';
    public static function ratingPush($request)
    {
        $WorkModel = new Works;
        $WorkModel->bnet_email = $request['bnet_email'];
        $WorkModel->bnet_password = $request['bnet_pass'];
        $WorkModel->tag = $request['tag'];
        $WorkModel->server = $request['server'];
        $WorkModel->startRank = $request['currentRank'];
        $WorkModel->currentRank = $request['currentRank'];
        $WorkModel->newRank = $request['newRank'];
        $WorkModel->price = $request['price'];
        $WorkModel->currency = $request['currency'];
        $WorkModel->user_id = $request['user_id'];
        $WorkModel->status = "unactive";

        $WorkModel->save();
    }

    public static function ratingDel($user_id)
    {
        DB::table('rating_works')
            ->where('user_id', '=', $user_id)
            ->where('status', "=", "unactive")
            ->delete();
    }
}
