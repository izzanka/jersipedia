@extends('layouts.app')
@section('title')
    Add Jersey
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jerseys.index') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Jersey</li>
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

    <form enctype="multipart/form-data" method="post" action="{{ route('jerseys.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card jersey-img">
                <div class="card-body">
                    <img class="img-fluid" id="preview_img" >
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                  
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>League</td>
                            <td>:</td>
                            <td>
                                <select name="league_id" class="form-control">
                                        <option value="" selected>-- Select League --</option>
                                    @foreach ($leagues as $league)
                                        <option value="{{ $league->id }}">{{ $league->name }}</option>
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
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
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
                                    class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
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
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price')}}">
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
                                    class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock')}}">
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
                                <input type="number" name="weight" step=".01"
                                    class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight')}}">
                                    <small>*gram</small>
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                   
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>:</td>
                            <td>
                                <input type="file" accept="image/*" class="form-control" name="image" onchange="loadFile(event)">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block"> Add</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
                    
        </div>
    </div>

</div>
<script>

    var loadFile = function(event){
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    
</script>
@endsection