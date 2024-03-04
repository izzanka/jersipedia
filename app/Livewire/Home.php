<?php

namespace App\Livewire;

use App\Models\League;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Home | Jersipedia')]
    public function render()
    {
        $leagues = League::get();
        $trending_products = Product::orderBy('sold', 'desc')->take(4)->get();
        $promo_products = Product::take(4)->get();

        return view('livewire.home', [
            'leagues' => $leagues,
            'trending_products' => $trending_products,
            'promo_products' => $promo_products,
        ]);
    }
}
