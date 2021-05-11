@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="row">
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
        <div class="col">
            <div class="table-responsive">
                @if (!empty($orderdetails))
                    <a href="{{ route('jersey') }}"><i class="bi bi-plus"></i> Order More</a>
                @endif
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jersey</th>
                            <th>Description</th>
                            <th>NameSet</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($orderdetails))
                            @foreach ($orderdetails as $orderdetail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ url('images/jersey') }}/{{ $orderdetail->jersey->image }}" class="img-fluid" width="200">
                                </td>
                                <td>
                                    {{ $orderdetail->jersey->name }}
                                </td>
                                <td>
                                    @if ($orderdetail->nameset)
                                        Name : {{ $orderdetail->name }} <br>
                                        Number : {{ $orderdetail->number }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $orderdetail->total_order }}
                                </td>
                                <td>
                                    Rp. {{ number_format($orderdetail->jersey->price) }}
                                </td>
                                <td align="right"><strong>Rp. {{ number_format($orderdetail->total_price) }}</strong></td>
                                <td>
                                    <a href="{{ route('cart.edit', [$orderdetail->id,"add"]) }}"><i class="bi bi-plus-circle text-success"></i></a>
                                    <a href="{{ route('cart.edit', [$orderdetail->id,"min"]) }}" ><i class="bi bi-dash-circle text-warning"></i></a>
                                    <a href="{{ route('cart.edit', [$orderdetail->id,"delete"]) }}"><i class="bi bi-x-circle text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach  
                        @else
                        <tr>
                            <td colspan="8"><strong>Cart Empty <a href="{{ route('jersey') }}"> Order Now!</a> </strong> </td>
                        </tr>
                        @endif

                        @if (!empty($order))
                       
                        {{ $orderdetails->links() }}
                          
                        <tr>
                            <td colspan="6" align="right"><strong>Total Price : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($order->total_price) }}</strong> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><strong>Unique Code : </strong></td>
                            <td align="right"><strong>{{ $order->code }}</strong> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="3">
                                <a href="{{ route('cart.checkout',$order->code) }}" class="btn btn-success">
                                    <i class="bi bi-arrow-right-circle"></i> Check Out
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div> 

@endsection
