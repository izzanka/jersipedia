<?php

namespace App\Livewire\Cart;

use App\Models\OrderDetail;
use Livewire\Attributes\Title;
use Livewire\Component;

class CartIndex extends Component
{
    public $selectedOrders = [];

    public bool $selectAll = false;

    public $order_details;

    public $order;

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedOrders = $this->order_details->pluck('id');
        } else {
            $this->selectedOrders = [];
        }
    }

    public function removeSelected()
    {
        if ($this->selectAll) {
            $this->order->delete();
        } else {
            $orderDetails = OrderDetail::select('id', 'total_price')->whereIn('id', $this->selectedOrders)->get();
            foreach ($orderDetails as $orderDetail) {
                $this->order->decrement('total_price', $orderDetail->total_price);
            }
            OrderDetail::whereIn('id', $this->selectedOrders)->delete();
        }

        $this->selectedOrders = [];
        $this->selectAll = false;
    }

    #[Title('Cart | Jersipedia')]
    public function render()
    {
        $this->order = auth()->user()->orders()->withCount('orderDetails')->where('status', 0)->latest()->first();
        if ($this->order) {
            $this->order_details = OrderDetail::with('product')->where('order_id', $this->order->id)->latest()->get();
        }

        return view('livewire.cart.cart-index', [
            //            'order' => $order,
            //            'order_details' => $order_details,
        ]);
    }
}
