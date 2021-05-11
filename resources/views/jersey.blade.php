@extends('layouts.app')
@section('title')
    List Jersey
@endsection
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <form action="{{ route('jersey') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                    </div>
                  </div>
            </form>
        </div>
    </div>

    <section class="jersey mb-5">
        <div class="row mt-4">
            @foreach($jerseys as $jersey)
            <div class="col-md-3 mb-3">
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

        <div class="row">
            <div class="col">
                {{ $jerseys->links() }}
            </div>
        </div>
    </section>
</div>
@endsection


