<?php

namespace App\View\Components;

use App\Order;
use Illuminate\View\Component;

class History extends Component
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
        $orders = Order::where('user_id',auth()->id())->where('status','!=',0)->count();
        return view('components.history',compact('orders'));
    }
}
