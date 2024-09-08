<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        return view('front.payment.create' , ['order' => $order]);
    }

    public function createPaymentIntent(Order $order)
    {
        $amount = $order->items->sum(function($item){
            return $item->price * $item->quantity;
        });
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'usd',
            'automatic_payment_methods' => ['card'],
        ]);
    }
}
