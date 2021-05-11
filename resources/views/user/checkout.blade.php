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
                    <li class="breadcrumb-item"><a href="{{ route('cart') }}" class="text-dark">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
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

    <div class="row">
        <div class="col">
            <a href="{{ route('cart') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <h4><i class="bi bi-truck"></i> Shipping Information</h4>
            <small>Powered By<a href="https://rajaongkir.com"> RajaOngkir</a></small>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    All field must be filled
                </div>
            @endif
            <form action="{{ route('cart.check.price',$order->code) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Phone</h6>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $order->phone }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Detail Address</h6>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $order->address ?? old('address')}}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Send From</h6>
                            <input type="text" value="{{ $default_province->id }}" name="province_from" hidden>
                            <input type="text" value="{{ $default_province->province }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $default_city->id }}" name="origin" hidden>
                            <input type="text" value="{{ $default_city->city_name }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Send To</h6>
                            <select name="province_to" class="form-control">
                                <option value="">Select Province</option>
                                @foreach($province as $p)
                                    <option value="{{$p->id}}">{{$p->province}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"> 
                            <select name="destination" class="form-control">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Total Weight</h6>
                            <input type="text" class="form-control" name="weight" value="{{ $order->total_weight }}" readonly>
                            <small>*gram</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <h6>Select Courier</h6>
                            <select name="courier" id="" class="form-control">
                                <option value="">Select Courier</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block"><i class="bi bi-tag"></i> Check Price</button>
            </form>
                @if($cekongkirs)
                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Estimation(Day)</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cekongkirs as $cekongkir)
                                <tr>
                                    <td>{{$cekongkir['service']}}</td>
                                    <td>{{$cekongkir['description']}}</td>
                                    <td><b>Rp. {{number_format($cekongkir['cost'][0]['value'])}}</b></td>
                                    <td>{{$cekongkir['cost'][0]['etd']}}</td>
                                    <td>{{$cekongkir['cost'][0]['note']}}</td>
                                    <td>
                                        
                                    <form action="{{ route('checkout.shipping',$order->code) }}" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{$cekongkir['service']}}" name="service">
                                        <input type="number" hidden value="{{$cekongkir['cost'][0]['value']}}" name="cost">
                                        <input type="text" hidden value="{{$cekongkir['cost'][0]['etd']}}" name="etd">
                                        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure?')"><i class="bi bi-check2-square"></i> Select</button>
                                    </form>
                                    
                                    </td>

                                </tr>   
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                @else
                @endif
            
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province_from"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'cart/checkout/checkprice/getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="origin"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="origin"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
            }
        });

        $('select[name="province_to"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/cart/checkout/checkprice/getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="destination"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="destination"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="destination"]').empty();
            }
        });
       
    });
</script>

@endsection