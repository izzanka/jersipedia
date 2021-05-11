@extends('layouts.app')
@section('title')
    CheckOut
@endsection
@section('content')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item">Cart</li>
                    <li class="breadcrumb-item">Check Out</li>
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session('message')['text'] }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
 
    <div class="row">
        
        <div class="col-md-4 mt-2">
            <h4><i class="bi bi-credit-card"></i> Payment Information</h4>
            <hr>
            <p class="text-danger">Please do the transfer before 24 hours, otherwise the order will be automatically failed</p>
            <p>Transfer to the account below for :<br><strong> Rp. {{ number_format($order->total_price) }}</strong> </p>
             <div class="media mt-3">
                <img class="mr-3" src="{{ url('images/payment/bca.png') }}"width="60">
                <div class="media-body">
                    <h5 class="mt-0">BANK BCA</h5>
                    Account Number <strong>012345-678-910</strong> / <strong>Izzan Khairil Anam</strong>
                </div>
            </div>
            <div class="media mt-3 mb-2">
                <img class="mr-3" src="{{ url('images/payment/paypal.png') }}"width="60">
                <div class="media-body">
                    <h5 class="mt-0">PAYPAL</h5>
                    Account Number <strong>012345-678-910</strong> / <strong>Izzan Khairil Anam</strong>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-2">
            <h4><i class="bi bi-truck"></i> Shipping Information</h4>
            <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Province</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Courier</th>
                                <th>Service</th>
                                <th>Estimation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>{{ $province->province }}</td>
                            <td>{{ $city->city_name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ strtoupper($order->courier) }}</td>
                            <td>{{ $order->service }}</td>
                            <td>{{ $order->estimation }}</td>
                        </tbody>
                    </table>
                </div>
                <form action="{{ route('cart.checkout',$order->code) }}" method="POST">
                    @csrf
                    <button class="btn btn-block btn-outline-success mt-2" type="submit" onclick="return confirm('Are you sure?')">Checkout Order</button>
                </form>
                <form action="{{ route('checkout.cancel',$order->code) }}" method="POST">
                    @csrf
                    <button class="btn btn-block btn-outline-danger mt-2" type="submit" onclick="return confirm('Are you sure?')">Cancel Order</button>
                </form>
                
        </div>
    </div>
</div>



@endsection