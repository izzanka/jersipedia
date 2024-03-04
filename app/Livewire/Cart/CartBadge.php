<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\On;
use Livewire\Component;

class CartBadge extends Component
{
    #[On('order-added')]
    public function render()
    {
        if (auth()->user()->orders->isNotEmpty()) {
            $total_orders = auth()->user()->orders()->where('status', 0)->latest()->first()->orderDetails()->count();
        } else {
            $total_orders = 0;
        }

        return view('livewire.cart.cart-badge', [
            'total_orders' => $total_orders,
        ]);
    }
}
