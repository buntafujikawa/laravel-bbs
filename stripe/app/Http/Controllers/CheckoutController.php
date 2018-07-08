<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function charge(Request $request)
    {
        try {
            // Stripeパッケージを初期化
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1999,
                'currency' => 'usd'
            ));

            return 'Charge successful, you get the course!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribe_process(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            // 実際使う婆にはダッシュボードから作れば良い
            // https://stripe.com/docs/api/php#create_plan
            \Stripe\Plan::create(array(
                "amount" => 5000,
                "interval" => "month",
                "product" => array(
                    "name" => "bronze"
                ),
                "currency" => "jpy",
                "id" => "bronze"
            ));

            $user = User::find(1);
            $user->newSubscription('main', 'bronze')->create($request->stripeToken);

            return 'Subscription successful, you get the course!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribe_change()
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->subscription('main')->swap('silver');

            return 'Plan changed successfully!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribe_cancel()
    {
        try {
            $user = User::find(1);
            $user->subscription('main')->cancel();

            return 'Subscription canceled!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function invoices()
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $invoices = $user->invoices();

            return view('invoices', compact('invoices'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function invoice($invoice_id)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);

            return $user->downloadInvoice($invoice_id, [
                'vendor'  => 'Your Company',
                'product' => 'Your Product',
            ]);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
