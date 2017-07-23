<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $table = "chat";
    public static function chatPush($request)
    {
        $Chat = new Chat;
        $Chat->name = $request['name'];
        $Chat->message = $request['message'];
        $Chat->user_id = $request['user_id'];
        $Chat->work_id = $request['work_id'];

        $Chat->save();
    }
}
