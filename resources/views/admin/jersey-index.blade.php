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

        @if (session()->has('message'))
        <div class="col-12">
            <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session('message')['text'] }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

    </div>

   

    <div class="row">
        <div class="col-md-9">
            <h2>{{ $title }}</h2><a href="{{ route('jerseys.create') }}"><i class="bi bi-plus"></i> Add Jersey</a>
        </div>
        <div class="col-md-3">
            <form action="{{ route('jerseys.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                    </div>
                  </div>
            </form>
        </div>
    </div>

    <section class="jersey mb-2">
        <div class="row mt-2">
            @foreach($jerseys as $jersey)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        @if ($jersey->stock === 0)
                            <i class="bi bi-exclamation-circle float-left"> <small class="text-danger"> Sold Out</small></i>
                        @else
                            <i class="bi bi-info-circle float-left"> <small> Sold : <i class="text-success">{{ $jersey->sold }}</i></small></i>
                        @endif

                        <i class="bi bi-info-circle float-right"> <small> Stock : <i class="text-success">{{ $jersey->stock }}</i></small></i>
                        
                        <img src="{{ url('images/jersey') }}/{{ $jersey->image }}" class="img-fluid" loading="lazy">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $jersey->name }}</strong> </h5>
                            </div>
                        </div>
                        <a href="{{ route('jerseys.edit',$jersey->id) }}"><i class="bi bi-pencil-square"></i></a>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                               <form action="{{ route('jerseys.destroy',$jersey->id) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i> Delete</button>
                               </form>
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


