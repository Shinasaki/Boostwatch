<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
    protected $table = 'works';
    public static function WorksPush($request)
    {
        $WorkModel = new WorkModel;
        $WorkModel->bnet_email = $request['bnet_email'];
        $WorkModel->bnet_password = $request['bnet_pass'];
        $WorkModel->tag = $request['tag'];
        $WorkModel->server = $request['server'];
        $WorkModel->currentRank = $request['currentRank'];
        $WorkModel->newRank = $request['newRank'];
        $WorkModel->price = $request['price'];
        $WorkModel->user_id = $request['user_id'];
        $WorkModel->status = "unactive";

        $WorkModel->save();
    }
}
