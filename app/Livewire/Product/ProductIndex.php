<?php

namespace App\Livewire\Product;

use App\Models\League;
use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    public string $cond = '';

    protected int $league_id = 0;

    public string $sort_by = 'Recent';

    protected array $filters = ['Recent', 'Reviews', 'Highest Price', 'Lowest Price'];

    protected string $league_name = '';

    public function mount(string $cond)
    {
        if ($cond == 'all') {
            $this->cond = $cond;
        } else {
            $league = League::select('id', 'name')->where('name_slug', $cond)->first();
            if ($league != null) {
                $this->league_id = $league->id;
                $this->league_name = $league->name;
            } else {
                $this->redirectRoute('home', navigate: true);
            }
            $this->cond = $cond;
        }
    }

    public function sort(string $filter)
    {
        if (! in_array($filter, $this->filters)) {
            $this->render();
        }
        $this->sort_by = $filter;
        $this->mount($this->cond);
    }

    public function render()
    {
        if ($this->cond == 'all') {
            $title = 'Products';
            if ($this->sort_by == 'Recent') {
                $products = Product::latest()->get();
            } elseif ($this->sort_by == 'Reviews') {
                $products = Product::orderBy('total_reviews', 'desc')->get();
            } elseif ($this->sort_by == 'Highest Price') {
                $products = Product::orderBy('price', 'desc')->get();
            } elseif ($this->sort_by == 'Lowest Price') {
                $products = Product::orderBy('price', 'asc')->get();
            }
        } elseif ($this->league_id != 0) {
            $title = $this->league_name;
            if ($this->sort_by == 'Recent') {
                $products = Product::where('league_id', $this->league_id)->latest()->get();
            } elseif ($this->sort_by == 'Reviews') {
                $products = Product::where('league_id', $this->league_id)->orderBy('total_reviews', 'desc')->get();
            } elseif ($this->sort_by == 'Highest Price') {
                $products = Product::where('league_id', $this->league_id)->orderBy('price', 'desc')->get();
            } elseif ($this->sort_by == 'Lowest Price') {
                $products = Product::where('league_id', $this->league_id)->orderBy('price', 'asc')->get();
            }
        }

        return view('livewire.product.product-index', [
            'products' => $products,
            'breadcrumb' => $title,
            'filters' => $this->filters,
        ])->title($title.' | Jersipedia');
    }
}
