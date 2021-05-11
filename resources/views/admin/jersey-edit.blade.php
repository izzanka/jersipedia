@extends('layouts.app')
@section('title')
    Edit Detail
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jerseys.index') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Jersey</li>
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
        <div class="col-md-6">
            <div class="card jersey-img">
                <div class="card-body">
                    <img src="{{ url('images/jersey') }}/{{ $jersey->image }}" class="img-fluid" loading="lazy">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <form action="{{ route('jerseys.update',$jersey->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>League</td>
                            <td>:</td>
                            <td>
                                <select name="league_id" class="form-control">
                                    @foreach ($leagues as $league)
                                    @php
                                        if($jersey->league_id == $league->id){
                                            $select = "selected";
                                        }else{
                                            $select = "";
                                        }
                                        echo "<option $select>".$league['name']."</option>"
                                    @endphp
                                    @endforeach
                                </select> 
                                @error('league_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $jersey->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="description"
                                    class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? $jersey->description }}">
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $jersey->price}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="stock"
                                    class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') ?? $jersey->stock}}">
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="weight"
                                    class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') ?? $jersey->weight}}">
                                <small>*gram</small>
                                    @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               
                            </td>
                           
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block"> Update</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection