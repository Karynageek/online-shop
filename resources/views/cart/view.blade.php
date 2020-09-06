@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">  
        <h2>item(s) in Shopping Cart</h2>

        @foreach($session_cart_items['product'] as $key => $value)
        </br><br>
        <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="{{ asset('storage/app/public/images/'.$value->image) }}">
        <p> Name  :{{$value->name}}, </h3>
        <p> Qty   :{{ $session_cart_items['quantity'] }}, </p>
        <p> Price : {{ $value->price }}. <p>
            @endforeach
    </div>

</div>
@endsection
