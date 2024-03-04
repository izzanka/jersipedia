<?php

namespace App\Livewire\Cart;

use App\Models\OrderDetail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CartDetail extends Component
{
    public OrderDetail $orderDetail;

    #[Validate]
    public int $qty = 0;

    public function mount()
    {
        $this->orderDetail->load('product');
        $this->qty = $this->orderDetail->total_order;
    }

    public function updatedQty($value)
    {
        $this->orderDetail->update([
            'total_order' => $value,
            'total_price' => $value * $this->orderDetail->product->price,
        ]);
    }

    public function rules()
    {
        return [
            'qty' => ['required', 'numeric', 'min:1', 'max:'.$this->orderDetail->product->stock],
        ];
    }


    public function render()
    {
        return view('livewire.cart.cart-detail');
    }
}
