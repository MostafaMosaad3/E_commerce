<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function show(Order $order)
    {
        $delivery = Delivery::query()->select([
            'id' , 'status' ,'order_id' ,
            DB::raw("ST_X(location) as lng") ,
            DB::raw("ST_y(location) as lat")
        ])->first();
        return view('front.orders.show', compact('order' , 'delivery'));
    }
}
