@extends('layouts.app')
@section('title')
    Jersey Detail
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jersey') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jersey Detail</li>
                </ol>
            </nav>
        </div>

        @if (session()->has('message'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{!! session()->get('message') !!}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card jersey-img">
                <div class="card-body">
                    <img src="{{ url('images/jersey') }}/{{ $jersey->image }}" class="img-fluid" loading="lazy">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $jersey->name }}</strong>
            </h2>
            <h4>
                <b>Rp. {{ number_format($jersey->price) }}</b>
                @if($jersey->stock === 0)
                <span class="badge badge-danger ml-2"><i class="bi bi-x"></i>Not Available</span>
                @else
                <span class="badge badge-success ml-2"><i class="bi bi-check"></i>Available</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <form action="{{ route('insert.cart', $jersey->id) }}" method="POST">
                    @csrf
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            @if ($jersey->stock === 0)
                            <td class="text-danger">Sold Out</td>
                            @else
                            <td>{{ $jersey->stock }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{ $jersey->description }}</td>
                        </tr>
                        <tr>
                            <td>League</td>
                            <td>:</td>
                            <td>
                                <img src="{{ url('images/league') }}/{{ $jersey->league->image }}" class="img-fluid mr-2"
                                    width="50">
                                <a href="{{ route('league',$jersey->league->id) }}">{{ $jersey->league->name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>:</td>
                            <td>{{ $jersey->weight }} gram</td>
                        </tr>
                        <tr>
                            <td colspan="3">NameSet <small>(fill if you want add nameset)</small></td>
                        </tr>

                        <tr>
                            <td>NameSet Price / Latter</td>
                            <td>:</td>
                            <td><b>Rp. {{ number_format($jersey->nameset_price) }}</b></td>
                        </tr>

                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="ex : izzan">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>:</td>
                            <td>
                                <input type="number"
                                    class="form-control @error('number') is-invalid @enderror"
                                    value="{{ old('number') }}" placeholder="0" name="number">
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>:</td>
                            <td>
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="0" name="amount">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" @if($jersey->stock === 0) disabled @endif><i class="bi bi-cart-plus"></i> Insert To Cart</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <section class="jersey mt-2 mb-2">
        <h4>
           <strong><i class="bi bi-award"></i> Related Jersey</strong>
        </h4>
        <div class="row mt-2">
           @foreach($jerseys as $jersey)
           <div class="col-md-3 mt-2">
              <div class="card">
                 <div class="card-body text-center">
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