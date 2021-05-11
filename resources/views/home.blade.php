@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        {{-- BANNER --}}
        <div class="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/slider/slider2.png') }}" class="d-block w-100" alt="..." loading="lazy">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{-- LEAGUE --}}
    <section class="league mt-4">
      <h4><strong><i class="bi bi-check2-circle"></i> Select League</strong></h4>
    <div class="row mt-4">
        @foreach($leagues as $league)
        <div class="col">
            <a href="{{ route('league',$league->id) }}">
                <div class="card shadow">
                <div class="card-body text-center">
                    <img src="{{ asset('images/league') }}/{{ $league->image }}" class="img-fluid" loading="lazy">
                </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    </section>

    {{-- TOP SELLER --}}

    <section class="jersey mt-4 mb-4">
      <h4>
         <strong><i class="bi bi-award"></i> Best Jersey</strong>
         <a href="{{ route('jersey') }}" class="btn btn-dark float-right"><i class="bi bi-eye"></i> All</a>
      </h4>
      <div class="row mt-4">
         @foreach($jerseys as $jersey)
         <div class="col-md-3 mt-2">
            <div class="card">
               <div class="card-body text-center">
                  
                  @if ($jersey->stock === 0)
                     <i class="bi bi-exclamation-circle float-left"> <small class="text-danger"> Sold Out</small></i>
                  @else
                     <i class="bi bi-info-circle float-left"> <small> Sold : <i class="text-success">{{ $jersey->sold }}</i></small></i>
                  @endif

                  <img src="{{ url('images/jersey') }}/{{ $jersey->image }}" class="img-fluid" loading="lazy">
                  <div class="row mt-2">
                     <div class="col-md-12">
                        <h5><strong>{{ $jersey->name }}</strong> </h5>
                        <h5>Rp. {{ number_format($jersey->price) }}</h5>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col-md-12">
                        <a href="{{ route('jersey.detail',$jersey->id) }}" class="btn btn-dark btn-block"><i class="bi bi-eye"></i> Detail</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>

   </section>

</div>
@endsection
