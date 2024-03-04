<div>
    <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 border rounded-3" alt="" src="{{asset('images/slider.png')}}" />
            </div>
        </div>
        <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="mt-3">
        <h2>Leagues</h2>
        <div class="text-center">
            @foreach($leagues as $league)
                <a class="btn btn-pill ms-2" href="{{route('products.index', $league->name_slug)}}" wire:navigate>
                    <span class="avatar me-2" style="background-image: url({{asset('images/' . $league->image)}})"></span>
                    {{$league->name}}
                </a>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <h2>Special Discounts</h2>
        <div class="row">
            @foreach($promo_products as $promo_product)
                <div class="col-3 mt-2">
                    <div class="card d-flex flex-column rounded-3">
                        <a href="{{route('products.detail', $promo_product->name_slug)}}" class="text-decoration-none">
                            <img class="card-img-top" src="{{asset('images/' . $promo_product->image)}}" alt="" />
                            <div class="card-body d-flex flex-column text-dark  ">
                                <h3 class="card-title">
                                    @currency($promo_product->price)
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div>
        <div class="row">
            <div class="col-6">
                <h2>Trending</h2>
            </div>
            <div class="col-6">
                <a href="{{route('products.index', 'all')}}" class="text-green float-end" wire:navigate><b>See More</b></a>
            </div>
        </div>
        <div class="row mt-2">
            @foreach($trending_products as $trending_product)
                <div class="col-3">
                    <div class="card d-flex flex-column rounded-3">
                        <a href="{{route('products.detail', $trending_product->name_slug)}}" class="text-decoration-none">
                            <img class="card-img-top" src="{{asset('images/' . $trending_product->image)}}" alt="" />
                            <div class="card-body d-flex flex-column text-dark  ">
                                <div class="mb-1">
                                    {{$trending_product->name}}
                                </div>
                                <h3 class="card-title">
                                    @currency($trending_product->price)
                                </h3>
                                <div>
                                    <span class="text-yellow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                                    </span>
                                        {{$trending_product->avg_review_ratings}}
                                        |
                                        {{$trending_product->sold}} sold
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
