<?php

namespace App\Http\Controllers\User;

use App\City;
use App\User;
use App\Order;
use App\Jersey;
use App\Province;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function ajax($id)
    {
        $cities = City::where('province_id',$id)->pluck('city_name','id');
        return json_encode($cities);
    }

    public function shipping(Request $request,$code)
    {
        $order = Order::where('user_id', auth()->id())->where('status',0)->where('code',$code)->first();
        $order->service = $request->service;
        $order->cost = $request->cost;
        $order->estimation = $request->etd;
        $order->total_price += $request->cost;
        $order->save();

        return redirect(route('payment',$order->code))->with('message',['text' => 'Please complete the payment!','class' => 'success']);
    }
}
