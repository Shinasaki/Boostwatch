<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

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

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect urls
        $url = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls
            ->setReturnUrl($url.'paypal/process')
            ->setCancelUrl($url.'paypal/cancel');

        // Set payment amount
        $amount = new Amount();
        $amount
            ->setCurrency("USD")
            ->setTotal(10);

        // Set transaction object
        $transaction = new Transaction();
        $transaction
            ->setAmount($amount)
            ->setDescription("Payment description");

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
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }

        return redirect($approvalUrl);
    }
}
