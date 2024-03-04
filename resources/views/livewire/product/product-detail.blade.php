<div>
    <div class="card rounded-3">
        <div class="card-body">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-green" wire:navigate>Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index', $product->league->name_slug)}}" class="text-green" wire:navigate>{{$product->league->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$product->name}}</a></li>
            </ol>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            <div class="card rounded-3">
                <div class="card-body">
                    <img src="{{asset('images/' . $product->image)}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-4">
            <h1>
                {{$product->name}}
            </h1>
            <div class="row">
                <div class="col-4">
                    Sold {{$product->sold}}+
                </div>
                <div class="col-4">
                <span class="text-yellow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                </span>
                    {{$product->avg_review_ratings}} ({{$product->total_reviews}} rating)
                </div>
                <div class="col-4">
                    Reviews ({{$product->total_reviews}})
                </div>
            </div>
            <h1 class="mt-3">
                @currency($product->price)
            </h1>
            <hr />
            <span class="text-secondary">Condition:</span> New<br>
            <span class="text-secondary">Minimum Order:</span> 1<br>
            <span class="text-secondary">League:</span> <a href="{{route('products.index', $product->league->name_slug)}}" wire:navigate class="text-green">{{$product->league->name}}</a><br>
            <p class="mt-3">
                {{$product->description}}
            </p>
        </div>
        <div class="col-4">
            <div class="card rounded-3">
                <div class="card-body">
                        <b>
                            Set Amount
                        </b>
                        <form wire:submit="insertIntoCart">
                            <div class="row mt-3">
                                <div class="col-8">
                                    <input type="number" class="text-center rounded-3 form-control @error('qty') is-invalid @enderror" wire:model.live="qty">
                                    @error('qty')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4 mt-2">
                                    Stock: <b>{{$product->stock}}</b>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    Subtotal
                                </div>
                                <div class="col-6">
                                    <b class="float-end">
                                        @currency($qty * $product->price)
                                    </b>
                                </div>
                            </div>
                            <button class="btn w-100 btn-green mt-3"type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12.5 17h-6.5v-14h-2" /><path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                Cart
                            </button>
                        </form>
                        <div class="row mt-3 text-center">
                            <div class="col-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                                    <b>Chat</b>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                    <b>Wishlist</b>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M8.7 10.7l6.6 -3.4" /><path d="M8.7 13.3l6.6 3.4" /></svg>
                                    <b>Share</b>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <hr id="reviews">
    @if($product->total_reviews != 0)
        <div class="row">
            <div class="col-4">
                <b>Buyer Reviews</b>
                <div class="text-center mt-3">
                    <div>
                        <span class="text-yellow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                        </span>
                        {{$product->avg_review_ratings}} <span class="text-secondary">/ 5.0</span>
                    </div>
                    <div class="mt-2">
                        <b> {{$total_good_ratings / $product->total_reviews * 100}}% buyers are satisfied</b>
                    </div>
                    <div class="mt-3 text-secondary">
                        {{$product->total_reviews}} reviews
                    </div>
                    <div class="mt-3">
                        @for($i = 5; $i > 0; $i--)
                            @foreach($ratings as $rate)
                                <div class="row mt-2">
                                    <div class="col-2 text-secondary">
                                    <span class="text-yellow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                                    </span>
                                            <b>{{$i}}</b>
                                    </div>
                                    <div class="col-8 mt-2">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" style="width: @if($rate->rating == $i) {{$rate->rating_count / $product->total_reviews * 100}}% @else 0 @endif" role="progressbar" aria-valuenow="{{$rate->rating_count}}" aria-valuemin="0" aria-valuemax="5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        @if($rate->rating == $i)
                                            {{$rate->rating_count}}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endfor

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <b>Featured Previews</b>
                    </div>
                    <div class="col-6">
                        <div class="dropdown float-end">
                            <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown">{{$sort_by}}</a>
                            <div class="dropdown-menu">
                                @foreach($filters as $filter)
                                    @if($filter != $sort_by)
                                        <a class="dropdown-item" href="#" wire:click.prevent="sort('{{$filter}}')">{{$filter}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    @foreach($reviews as $review)
                        <div class="row">
                            <div class="col-11">
                                @for($star = 1; $star <= 5; $star++)
                                    @if($review->rating >= $star)
                                        <span class="text-yellow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                                        </span>
                                    @else
                                        <span class="text-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                        </span>
                                    @endif
                                @endfor
                                {{$review->created_at->diffForHumans()}}
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 mt-1">
                                <span class="avatar rounded-circle avatar-sm" style="background-image: url({{$review->user->image}})"></span>
                            </div>
                            <div class="col-10 mt-2 ms-2">
                                <b>
                                    {{$review->user->name}}
                                </b>
                            </div>
                        </div>
                        <p class="mt-2">
                            {{$review->comment}}
                        </p>
                        <hr class="mb-2 mt-1">
                    @endforeach
                </div>
                <div>
                    {{$reviews->links(data: ['scrollTo' => '#reviews'])}}
                </div>
            </div>
        </div>
        <hr>
    @else
        <div class="text-center">
            No Reviews
        </div>
        <hr>
    @endif
    <div>
        <div class="row">
            <div class="col-6">
                <h2>Related Products</h2>
            </div>
            <div class="col-6">
                <a class="text-green float-end" href="{{route('products.index', $product->league->name_slug)}}" wire:navigate><b>See More</b></a>
            </div>
        </div>
        <div class="row mt-2">
            @foreach($related_products as $related_products)
                <div class="col-3">
                    <div class="card d-flex flex-column rounded-3">
                        <a href="{{route('products.detail', $related_products->name_slug)}}" class="text-decoration-none">
                            <img class="card-img-top" src="{{asset('images/' . $related_products->image)}}" alt="" />
                            <div class="card-body d-flex flex-column text-dark  ">
                                <div class="mb-1">
                                    {{$related_products->name}}
                                </div>
                                <h3 class="card-title">
                                    @currency($related_products->price)
                                </h3>
                                <div>
                                <span class="text-yellow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                                </span>
                                    {{$related_products->avg_review_ratings}}
                                    |
                                    {{$related_products->sold}} sold
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
