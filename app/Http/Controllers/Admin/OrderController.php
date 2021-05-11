<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use App\Order;
use App\Jersey;
use App\OrderDetail;
use App\Exports\OrderExport;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {   
        $date_now = Carbon::now();
        $ordersdate = Order::select('status','updated_at','id')->where('status','!=',0)->get();
        
        foreach($ordersdate as $order){
           $result = $order->updated_at->diffInDays();

           if($result == 1){
               $order->status = 3;
               $order->update();
               
               $orderdetails = OrderDetail::where('order_id',$order->id)->get();
                foreach($orderdetails as $orderdetail){
                    $jersey = Jersey::where('id',$orderdetail->jersey_id)->first();
                    $jersey->stock += $orderdetail->total_order;
                    $jersey->update();
                }    
           }
        }
        
        $orders = Order::where('status','!=',0)->latest()->paginate(4);
        $income = Order::where('status',2)->sum('total_price');
        $cost = Order::where('status',2)->sum('cost');
        $total_income = $income - $cost;
        
        return view('admin.order',compact('orders','total_income'));
        
    }

    public function confirm($code)
    {
        $order = Order::where('code',$code)->where('status',1)->firstOrFail();
        $order->status = 2;
        $order->update();

        $orderdetails = OrderDetail::where('order_id',$order->id)->get();

        foreach($orderdetails as $orderdetail)
        {
            $jersey = Jersey::where('id',$orderdetail->jersey_id)->first();
            $jersey->sold += $orderdetail->total_order;
            $jersey->update();
        }

        return back()->with('message',['text' => 'Order was confirmed successfully!', 'class' => 'success']);
    }

    public function detail($code)
    {
        $order = Order::where('code',$code)->firstOrFail();
        return view('admin.order-detail',compact('order'));
    }

    public function export_excel()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
