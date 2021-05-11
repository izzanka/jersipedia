@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-person"></i> <b> My Profile </b>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update',auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror ">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" value="{{ auth()->user()->phone }}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{ auth()->user()->address }}" class="mb-4 form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn-sm btn btn-primary float-right"><i class="bi bi-pen"></i> Update Profile</button>
                        </div>
                        
                    </form>  
                </div>         
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-key"></i> <b> Password</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update_password',auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Password Confirm</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn-sm btn btn-primary mt-4 float-right"><i class="bi bi-pen"></i> Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <i class="bi bi-person-x"></i> <b> Delete Account</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.delete.account',auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <small><b class="text-danger">Once your account is deleted, all of resources and data will be permanently deleted</b></small><br>
                        <button type="submit" class="btn btn-danger btn-sm float-right mt-2" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
