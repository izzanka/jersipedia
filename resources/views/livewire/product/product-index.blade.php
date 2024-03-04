<div>
    <div class="card rounded-3">
        <div class="card-body">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-green" wire:navigate>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$breadcrumb}}</a></li>
            </ol>
        </div>
    </div>

    <div class="float-end mt-3">
        <div class="dropdown">
            <b class="me-2 text-secondary">Sort By:</b>
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

    <div class="row mt-5">
        @foreach($products as $product)
            <div class="col-3 mt-3">
                <div class="card d-flex flex-column rounded-3">
                    <a href="{{route('products.detail', $product->name_slug)}}" class="text-decoration-none">
                        <img class="card-img-top" src="{{asset('images/' . $product->image)}}" alt="" />
                        <div class="card-body d-flex flex-column text-dark  ">
                            <div class="mb-1">
                                <b>{{$product->name}}</b>
                            </div>
                            <h3 class="card-title text-orange">
                                @currency($product->price)
                            </h3>
                            <div>
                                <span class="text-yellow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>
                                </span>
                                {{$product->avg_review_ratings}}
                                |
                                {{$product->sold}} sold
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
