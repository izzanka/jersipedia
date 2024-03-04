<?php

namespace App\Livewire\Product;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductDetail extends Component
{
    use WithoutUrlPagination, WithPagination;

    public Product $product;

    public string $sort_by = 'Recent';

    protected array $filters = ['Recent', 'Highest Rating', 'Lowest Rating'];

    #[Validate]
    public int $qty = 1;

    public function mount()
    {
        $this->product->load(['league', 'reviews']);
    }

    public function rules()
    {
        return [
            'qty' => ['required', 'numeric', 'min:1', 'max:'.$this->product->stock],
        ];
    }

    public function sort(string $filter)
    {
        if (! in_array($filter, $this->filters)) {
            $this->render();
        }
        $this->sort_by = $filter;
        $this->render();
    }

    public function insertIntoCart()
    {
        $validated = $this->validate();

        try {

            $total_price = $validated['qty'] * $this->product->price;
            $total_weight = $validated['qty'] * $this->product->weight;
            $random_code = mt_rand(10000, 99999);

            $checkOrder = Order::where('user_id', auth()->id())->where('status', 0)->latest()->first();

            $order = null;

            if ($checkOrder) {
                $checkOrder->incrementEach([
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                ]);
                $order = $checkOrder;
            } else {
                $newOrder = auth()->user()->orders()->create([
                    'code' => $random_code,
                    'status' => 0,
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                ]);
                $order = $newOrder;
            }

            $checkOrderDetail = OrderDetail::where('order_id', $order->id)->where('product_id', $this->product->id)->first();

            if ($checkOrderDetail) {
                $checkOrderDetail->incrementEach([
                    'total_order' => $validated['qty'],
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                ]);
            } else {
                $order->orderDetails()->create([
                    'product_id' => $this->product->id,
                    'total_order' => $validated['qty'],
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                ]);
                $this->dispatch('order-added');
            }

            $this->reset('qty');

            $this->dispatch('toast',
                message: 'Added Successfully',
                success: true,
            );

        } catch (\Throwable $th) {
            $this->dispatch('toast',
                message: 'Something went wrong, please try again later. ',
                success: false,
            );
        }
    }

    public function render()
    {
        if ($this->sort_by == 'Recent') {
            $reviews = Review::with('user')->where('product_id', $this->product->id)->latest()->paginate(5);
        } elseif ($this->sort_by == 'Highest Rating') {
            $reviews = Review::with('user')->where('product_id', $this->product->id)->orderBy('rating', 'desc')->paginate(5);
        } elseif ($this->sort_by == 'Lowest Rating') {
            $reviews = Review::with('user')->where('product_id', $this->product->id)->orderBy('rating', 'asc')->latest()->paginate(5);
        }

        $ratings = Review::where('product_id', $this->product->id)->select('rating', DB::raw('COUNT(*) as rating_count'))->groupBy('rating')->orderBy('rating', 'desc')->get();
        $related_products = Product::whereNot('id', $this->product->id)->where('league_id', $this->product->league->id)->latest()->take(4)->get();
        $total_good_ratings = $ratings->where('rating', '>=', 4)->sum('rating_count');

        return view('livewire.product.product-detail', [
            'product' => $this->product,
            'reviews' => $reviews,
            'ratings' => $ratings,
            'total_good_ratings' => $total_good_ratings,
            'filters' => $this->filters,
            'related_products' => $related_products,
        ])->title($this->product->name.' | Jersipedia');
    }
}
