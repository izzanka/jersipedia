<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Order;
use App\Jersey;
use App\Province;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($code)
    {
        $order = Order::where('code',$code)->first();
        $province = Province::where('id',$order->province_id)->first();
        $city = City::where('id',$order->city_id)->first();
        
        return view('user.payment',compact('order','province','city'));
    }

   public function checkout($code)
   {
        $order = Order::where('user_id', auth()->id())->whereIn('status',[0,3,4])->where('code',$code)->first();
        $order->status = 1;
        $order->update();

        $orderdetails = OrderDetail::where('order_id',$order->id)->get();

        foreach($orderdetails as $orderdetail){
            $jersey = Jersey::where('id',$orderdetail->jersey_id)->first();
            $jersey->stock -= $orderdetail->total_order;
            $jersey->update();
        }
        
        return redirect('history')->with('message',['text' => 'Checkout successfully, please wait our admin to response','class' => 'success']);
    }

    public function cancel($code)
    {
        $order = Order::where('user_id',auth()->id())->whereIn('status',[0,3,4])->where('code',$code)->first();
        $order->status = 4;
        $order->update();

        return redirect('history')->with('message',['text' => 'Order cancelled','class' => 'danger']);
        
    }
}
