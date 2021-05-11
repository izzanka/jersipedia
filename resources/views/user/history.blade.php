@extends('layouts.app')
@section('title')
    History
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p>If payment failed to be confirmed, please order again and make sure you transfer to the right account below!</p>
                    <div class="media mt-3">
                        <img class="mr-3" src="{{ url('images/payment/bca.png') }}" alt="Bank BRI" width="60">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BCA</h5>
                            Account Number <strong>012345-678-910</strong> / <strong>Izzan Khairil Anam</strong>
                        </div>
                        <img class="mr-3" src="{{ url('images/payment/paypal.png') }}" alt="Bank BRI" width="60">
                        <div class="media-body">
                            <h5 class="mt-0">PAYPAL</h5>
                            Account Number <strong>012345-678-910</strong> / <strong>Izzan Khairil Anam</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Date</th>
                            <th>Unique Code</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Total Order</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->code }}</td>
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
                                @if ($order->status == 1)
                                    Payment is being confirmed
                                @elseif($order->status == 2)
                                    Payment was confirmed successfully<br>
                                    <small>Your order will be delivered</small>
                                @elseif($order->status == 3)
                                    Payment failed to be confirmed
                                @elseif($order->status == 4)
                                    Order canceled
                                @endif
                            </td>
                            <td>
                                {{ $total_order }}
                            </td>
                            <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                            <td>
                                @if ($order->status == 1)
                                @else
                                    <a href="{{ route('history.delete',$order->code) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-trash text-danger"></i></a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>    
                            <td colspan="7"><strong>History Empty</strong></td>
                        </tr>
                        @endforelse
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        {{ $orders->links() }}
    </div>

   
</div>
@endsection