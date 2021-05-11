@extends('layouts.app')
@section('title')
    Order Detail
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <p>Name    : {{ $order->user->name }}</p>
                    <p>Email   : {{ $order->user->email }}</p>
                    <p>Phone   : {{ $order->user->phone ?? 'NULL'}}</p>
                    <p>Address : {{ $order->user->address ?? 'NULL'}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Order date</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Jersey</th>
                                    <th>Total Order</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                      
                                <tr>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->updated_at}}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @php
                                        $orderdetails = \App\OrderDetail::where('order_id',$order->id)->get();
                                        $total_order = $orderdetails->sum('total_order');
                                        @endphp
                                        @foreach ($orderdetails as $orderdetail)
                                            <img src="{{ url('images/jersey') }}/{{ $orderdetail->jersey->image }}"
                                            class="img-fluid" width="50" loading="lazy"><br>
                                            {{ $orderdetail->jersey->name }}<b>(x{{ $orderdetail->total_order }})</b>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>{{ $total_order }}</td>
                                    <td><b class="text-danger">Rp. {{ number_format($order->total_price) }}</b></td>
                                    <td>
                                        @if ($order->status == 1)
                                        Payment is being confirmed
                                        @elseif($order->status == 2)
                                            Payment was confirmed successfully<br>
                                        @elseif($order->status == 3)
                                            Payment failed to be confirmed
                                        @endif
                                    </td>
                                </tr>
                     
                                
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>

   
   


</div>
@endsection