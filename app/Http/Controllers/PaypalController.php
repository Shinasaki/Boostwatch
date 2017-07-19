<?php

namespace App\Http\Controllers;

use DB;
use session;
use Cookie;
use View;
use AUth;
use App\Models\Bill;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ExecutePayment;

class PaypalController extends Controller
{

    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('member');
    }

    public function payment()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
            'AcWEB9BtXy9eQnU8bTmG8hrFhZUED5ODPT2gshngiQFMR2Gu26e8ML_RzC-vK1H4di2nwRrqdMGy2xwx',
            'EA--4uXYDDsBEullcQHSFvzPp_7_noLEmIMirXckXNV8q-0Fff5OFN2SeVtHlhtq5nYmBvZycFgBxwxq'
            )
        );
        // Currency
        if(Cookie::get('Locale') == "en") {
            $currency = "USD";
        } else {
            $currency = "THB";
        }

        // Desciption
        $desciption =
            session('works')[0]['tag']." ( ".
            session('works')[0]['currentRank']." - ".
            session('works')[0]['newRank']." ) ".
            session('works')[0]['price'].$currency;

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect urls
        $url = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls
            ->setReturnUrl($url.'/paypal/process')
            ->setCancelUrl($url.'/paypal/cancel');

        // Set payment amount
        $amount = new Amount();
        $amount
            ->setCurrency($currency)
            ->setTotal(session('works')[0]['price']);

        // Set transaction object
        $transaction = new Transaction();
        $transaction
            ->setAmount($amount)
            ->setDescription($desciption);

        // Create the full payment object
        $payment = new Payment();
        $payment
            ->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        // Create payment with valid API context
        try {
          $payment->create($apiContext);

          // Get PayPal redirect URL and redirect user
          $approvalUrl = $payment->getApprovalLink();

          // REDIRECT USER TO $approvalUrl
      } catch (\PayPal\Exception\PayPalConnectionException $ex) {
          return redirect('/checkout?alert=Payment Error. Please try again.');
      } catch (\Exception $ex) {
          return redirect('/checkout?alert=Payment Error. Please try again.');
        }
        return redirect($approvalUrl);
    }

    public function callback($callback)
    {
        switch ($callback) {
            case 'process':

            // Auth
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                'AcWEB9BtXy9eQnU8bTmG8hrFhZUED5ODPT2gshngiQFMR2Gu26e8ML_RzC-vK1H4di2nwRrqdMGy2xwx',
                'EA--4uXYDDsBEullcQHSFvzPp_7_noLEmIMirXckXNV8q-0Fff5OFN2SeVtHlhtq5nYmBvZycFgBxwxq'
                )
            );

            // Create new payer and method
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            // Get payment object by passing paymentId
            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);
            $payerId = $_GET['PayerID'];


            // Execute payment with payer id
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);


            // Execute payment
            try {
                $result = $payment->execute($execution, $apiContext);
                //var_dump($result);
            } catch(\PayPal\Exception\PayPalConnectionException $ex) {
                return redirect('/checkout?alert=Payment Timeout');
            } catch (\Exception $ex) {
                return redirect('/checkout?alert=Payment Timeout');
            }


            // Active work in sqlr
            DB::table('rating_works')
                ->where('id', session('works')[0]['work_id'])
                ->update(['status' => 'active']);

            // Insert Bill to sql
            Bill::createRatingBill([
                'payment_user' => Auth::id(),
                'payment_id' => $result->id,
                'payment_cart' => $result->cart,
                'payer_id' => $result->payer->payer_info->payer_id,
                'payer_email' => $result->payer->payer_info->email,
                'payer_firstname' => $result->payer->payer_info->first_name,
                'payer_lastname' => $result->payer->payer_info->last_name,
                'payer_country' => $result->payer->payer_info->shipping_address->country_code,
                'price' => $result->transactions[0]->related_resources[0]->sale->amount->total,
                'currency' => $result->transactions[0]->related_resources[0]->sale->amount->currency,
                'description' => $result->transactions[0]->description,
            ]);

            // Remove Work Tab
            session()->forget('works');

            // Goto Bill
            return View::make('payment.complete', compact('result'));
            break;

            case 'cancel':
                return redirect('/checkout?alert=Payment Cancel');
            break;
        }
    }
}
