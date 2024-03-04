<div>
    <b>
        Cart
    </b>
    <div class="row mt-3">
        <div class="col-7">
            <div class="card rounded-3">
                <div class="card-body">
                    @if($order == null)
                        <div class="text-center">
                                <b>Your cart is empty</b>
                                <div class="text-secondary mt-1">
                                    Want something? Add it to your cart now!
                                </div>
                                <a href="{{route('home')}}" wire:navigate class="btn btn-success mt-2 rounded-3">Start Shopping</a>
                        </div>
                    @endif
                    @if($order != null)
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" class="form-check-input me-1" wire:model.live="selectAll" onclick="this.blur();">
                            </div>
                            <div class="col-3">
                                <b>Select All ({{$order->order_details_count}})</b>
                            </div>
                            <div class="col-8">
                                @if($selectedOrders != [])
                                    <a href="#" wire:click.prevent="removeSelected" class="text-green float-end">
                                        <b>Remove</b>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($order)
                <div class="card rounded-3 mt-2">
                    <div class="card-body">
                        @foreach($order_details as $orderDetail)
                            <div class="row">
                                <div class="col-1">
                                    <input type="checkbox" class="form-check-input me-1" wire:model.live="selectedOrders" onclick="this.blur();" value="{{$orderDetail->id}}">
                                </div>
                                <div class="col-2">
                                    <a href="{{route('products.detail', $orderDetail->product->name_slug)}}" class="text-dark text-decoration-none">
                                        <img src="{{asset('images/' . $orderDetail->product->image)}}" class="">
                                    </a>
                                </div>
                                <div class="col-7">
                                    <a href="{{route('products.detail', $orderDetail->product->name_slug)}}" class="text-dark text-decoration-none">
                                        {{$orderDetail->product->name}}
                                    </a>
                                </div>
                                <livewire:cart.cart-detail :$orderDetail :key="$orderDetail->id"/>
                            </div>
                            @if(!$loop->last)
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11">
                                        <hr class="mt-3 mb-3 text-secondary">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="col-5">
            <div class="card rounded-3">
                <div class="card-body">
                    <b>Shopping summary</b>
                    <div class="row mt-3">
                        <div class="text-secondary">
                            <span>
                                Total
                            </span>
                            <span class="float-end">
                                @if($order == null)
                                    -
                                @endif
                            </span>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <button class="btn btn-success w-100 rounded-3" @if($order == null) disabled @endif>
                        Buy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
