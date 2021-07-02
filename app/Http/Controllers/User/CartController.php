<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Order;
use App\Jersey;
use App\Province;
use App\OrderDetail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id',auth()->id())->where('status',0)->first();

        if($order){
            if(!Gate::allows('checkPayment',$order)){
                return redirect(route('payment',$order->code))->with('message',['text' => 'Please complete this payment first!','class' => 'danger']);
            }else{
                $orderdetails = OrderDetail::with('jersey')->where('order_id', $order->id)->paginate(2);
                return view('user.cart',compact('order','orderdetails'));
            }
        }

        return view('user.cart');
    }

    public function edit(OrderDetail $orderdetail,$cond){

        if($cond == "add")
        {
            $orderdetail->total_order += 1;

            if($orderdetail->total_order > $orderdetail->jersey->stock){
                return back()->with('error','Cant Order More Than ' . $orderdetail->jersey->stock);
            }

            $orderdetail->total_price += $orderdetail->jersey->price;
            $orderdetail->total_weight += $orderdetail->jersey->weight;
            $orderdetail->update();

            $order = Order::where('id',$orderdetail->order_id)->first();
            $order->total_price += $orderdetail->jersey->price;
            $order->total_weight += $orderdetail->jersey->weight;
            $order->update();

            return back();

        }else if($cond == "min"){

            if($orderdetail->total_order === 1){
                $order = Order::where('id',$orderdetail->order_id)->first();
                $order->forceDelete();
                $orderdetail->forceDelete();
                return back();
            }else{
                $orderdetail->total_order -= 1;
                $orderdetail->total_price -= $orderdetail->jersey->price * 1;
                $orderdetail->total_weight -= $orderdetail->jersey->weight;
                $orderdetail->update();
            }
            
            $order = Order::where('id',$orderdetail->order_id)->first();
            $order->total_price -= $orderdetail->jersey->price * 1;
            $order->total_weight -= $orderdetail->jersey->weight;
            $order->update();
    
            return back();

        }else if($cond == "delete"){

            if(!empty($orderdetail)){
                $order = Order::where('id',$orderdetail->order_id)->first();
                $total_order = OrderDetail::where('order_id',$order->id)->count();
                if($total_order === 1){
                    $order->forceDelete();
                }else{
                    $order->total_price -= $orderdetail->total_price;
                    $order->total_weight -= $orderdetail->total_weight;
                    $order->update();
                }

                $orderdetail->forceDelete();
            }

            return back()->with('message',['text' => 'Order was successfully deleted from cart!','class' => 'success']);
        }
    }

    public function checkout($code)
    {
        $order = Order::where('user_id',auth()->id())->where('code',$code)->where('status',0)->firstOrFail();

        if(!Gate::allows('checkPayment',$order)){
            return redirect(route('payment',$order->code))->with('message',['text' => 'Please complete this payment first!','class' => 'danger']);
        }

        $cekongkirs = null;
        $province = Province::all();
        $default_province = Province::find(6);
        $default_city = City::find(154);
    
        return view('user.checkout',compact('order','province','cekongkirs','default_province','default_city'));
    }

    public function check_price(Request $request,$code){

        $validator = Validator::make($request->all(),[
            'phone' => 'required|numeric|digits:12',
            'address'  => 'required',
            'province_to'  => 'required',
            'destination'  => 'required',
            'courier'  => 'required',
            'origin'  => 'required',
            'destination'  => 'required',
            'weight' => 'required',
            'courier' => 'required'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $province = Province::all();
        $default_province = Province::find(6);
        $default_city = City::find(154);

        $order = Order::where('user_id',auth()->id())->where('code',$code)->firstOrFail();
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->province_id = $request->province_to;
        $order->city_id = $request->destination;
        $order->courier = $request->courier;
        $order->save();

        $response = Http::asForm()->withHeaders([
            'key' => 'adb1703464d17d38db117620f6ebc68c'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier
        ]);
        
        $cekongkirs = $response["rajaongkir"]["results"][0]["costs"];

        return view('user.checkout',compact('order','province','cekongkirs','default_province','default_city'));
    }
}
