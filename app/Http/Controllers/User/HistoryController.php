<?php

namespace App\Http\Controllers\User;

use App\Order;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->where('status','!=',0)->latest()->paginate(4);
        return view('user.history',compact('orders'));
    }

    public function destroy($code)
    {
        $order = Order::where('code',$code)->firstOrFail();
        $order->delete();
        return back()->with('message',['text' => 'History order successfully deleted!','class' => 'success']);
    }
}
