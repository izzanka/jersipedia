<?php

namespace App\Http\Controllers;

use App\Order;
use App\Jersey;
use App\OrderDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JerseyController extends Controller
{
    public function index(Request $request)
    {
        $title = 'List Jersey';
        if($request->search){
            $jerseys = Jersey::where('name','like','%' . $request->search . '%')->latest()->paginate(8);
        }else{
            $jerseys = Jersey::latest()->paginate(8);
        }
        return view('jersey',compact('jerseys','title'));
    }

    public function show(Jersey $jersey)
    {
        $jerseys = Jersey::with('league')->where('id','!=',$jersey->id)->latest()->take(4)->get();
        return view('jerseydetail',compact('jersey','jerseys'));
    }

    public function insert_cart(Request $request,Jersey $jersey)
    {
        $user = auth()->id();
        $order = Order::where('user_id',$user)->where('status',0)->first();

        if($order){
            if($order->province_id && $order->city_id && $order->courier && $order->service != null){
                return redirect(route('payment',$order->code))->with('message',['text' => 'Please complete this payment first!','class' => 'danger']);
            }
        }

        $validator = Validator::make($request->all(),[
            'amount' => 'required|numeric|min:1|max:' . $jersey->stock,
            'name' => 'nullable|alpha|max:15',
            'number' => 'nullable|numeric|max:99'
        ]);

        if($validator->fails()){
            return redirect()
                ->route('jersey.detail',$id)
                ->withErrors($validator)
                ->withInput();
        }

        if($request->name){
            $nameset_price = strlen($request->name) * $jersey->nameset_price;
            $total_price = $request->amount * $jersey->price + $nameset_price;
        }else{
            $total_price = $request->amount * $jersey->price;
        }
        $total_weight = $request->amount * $jersey->weight;

        if(empty($order)){
            Order::create([
                'user_id' => $user,
                'total_price' => $total_price,
                'total_weight' => $total_weight,
                'code' => mt_rand(1000000000,9999999999)
            ]);
        }else{
            $order->total_price += $total_price;
            $order->total_weight += $total_weight;
            $order->update();
        }

        $order = Order::where('user_id',$user)->where('status',0)->first();

        OrderDetail::create([
            'jersey_id' => $jersey->id,
            'order_id' => $order->id,
            'total_order' => $request->amount,
            'nameset' => $request->name ? true : false,
            'name' => $request->name,
            'number' => $request->number,
            'total_price' => $total_price,
            'total_weight' => $total_weight
        ]);
        
        $msg = 'Jersey was successfully added to <a href="'. route('cart') . '">cart</a>';
        return back()->with('message',$msg);
    }
}
