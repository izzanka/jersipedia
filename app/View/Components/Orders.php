<?php

namespace App\View\Components;

use App\Order;
use App\OrderDetail;
use Illuminate\View\Component;

class Orders extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $orders = Order::where('status','!=',0)->count();
        return view('components.orders',compact('orders'));
    }
}
