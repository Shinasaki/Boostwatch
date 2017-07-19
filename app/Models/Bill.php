<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'rating_bills';
    public static function createRatingBill($request)
    {
        $Bill = new Bill;
        $Bill->payment_user = $request['payment_user'];
        $Bill->payment_id = $request['payment_id'];
        $Bill->payment_cart = $request['payment_cart'];
        $Bill->payer_id = $request['payer_id'];
        $Bill->payer_email = $request['payer_email'];
        $Bill->payer_firstname = $request['payer_firstname'];
        $Bill->payer_lastname = $request['payer_lastname'];
        $Bill->payer_country = $request['payer_country'];
        $Bill->price = $request['price'];
        $Bill->currency = $request['currency'];
        $Bill->description = $request['description'];
        $Bill->save();
    }
}
