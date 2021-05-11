@extends('layouts.app')
@section('title')
    Order
@endsection
@section('content')

<div class="container">
    <div class="row mt-2 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order</li>
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    Total Income : 
                    <h4 class="float-right"><b>Rp. {{ number_format($total_income) }}</b></h4>
                </div>
            </div>
        </div>

        <div class="col">
            <a href="{{ route('order.export.excel') }}" class="btn btn-outline-success float-right mt-2">Export Excel</a>
            
        </div>

    </div>


 
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Order Date</th>
                            <th>Description</th>
                            <th>Total Order</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
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
                                <td>
                                   {{ $total_order }}
                                </td>
                                <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                                <td>
                                    @if ($order->status == 1)
                                        Payment is waiting to be confirmed
                                    @elseif($order->status == 2)
                                        Payment was confirmed successfully
                                    @elseif($order->status == 3)
                                        Payment failed to be confirmed
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status == 1)
                                        <a href="{{ route('order.confirm',$order->code) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-check-circle text-success"></i> Confirm</a>
                                    @endif
                                    <a href="{{ route('order.detail',$order->code) }}"><i class="bi bi-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                        
                       


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection