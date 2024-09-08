<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveriesController extends Controller
{
    public function show($id)
    {
        $delivery = Delivery::query()->select([
            'id' , 'status' ,'order_id' ,
                DB::raw("ST_X(location) as lng") ,
                DB::raw("ST_y(location) as lat")
            ])->where('id', $id)
            ->findOrFail($id);

        return $delivery ;
    }



        public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'lng' => ['required', 'numeric'],
            'lat' => ['required', 'numeric'],
        ]);

        $delivery->update([
            'location' => DB::raw("POINT({$request->lng}, {$request->lat})"),
        ]);

        return $delivery;
    }
}
