@extends('layout.app')

@section('title', 'Home')

@section('main')
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
            <img class="d-block w-100" alt="" src="/samples/photos/city-lights-reflected-in-the-water-at-night.jpg" />
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt="" src="/samples/photos/color-palette-guide-sample-colors-catalog-.jpg" />
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt="" src="/samples/photos/finances-us-dollars-and-bitcoins-currency-money.jpg" />
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt="" src="/samples/photos/tropical-palm-leaves-floral-pattern-background.jpg" />
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" alt="" src="/samples/photos/young-woman-working-in-a-cafe.jpg" />
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
@endsection
