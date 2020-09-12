@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br/>
            <h4>Order</h4>
            <br/>
        </div>
        <div class="order-container">
            <div class="order-products">
                @if($products)
                @foreach($products as $key => $value)
                <div class="order-product-item">
                        <p>Name product: {{ $value['name'] }}</p>
                        <p>Price: ${{ $value['price'] }}</p>
                        <p>Quantity: {{ $value['quantity'] }}</p> 
                </div>
                @endforeach
                @endif
            </div>
            <div><p>Total sum: ${{ $total }}</p></div>
        </div> 
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-order-create')}}" method="post" 
                      enctype="multipart/form-data">
                    @csrf
                    <p>Email</p>
                    <input id="billing_email" type="email" class="form-control 
                           @error('billing_email') is-invalid @enderror" 
                           name="billing_email" value="{{ old('billing_email') }}" 
                           required="">
                    @error('billing_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Phone</p>
                    <input id="billing_phone" type="number" class="form-control 
                           @error('billing_phone') is-invalid @enderror" 
                           name="billing_phone" value="{{ old('billing_phone') }}" 
                           required="">
                    @error('billing_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Post office</p>
                    <input id="billing_address" type="text" class="form-control 
                           @error('billing_address') is-invalid @enderror" 
                           name="billing_address" value="{{ old('billing_address') }}" 
                           required="">
                    @error('billing_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Card</p>
                    <input id="billing_name_on_card" type="number" class="form-control 
                           @error('billing_name_on_card') is-invalid @enderror" 
                           name="billing_name_on_card" value="{{ old('billing_name_on_card') }}" 
                           required="">
                    @error('billing_name_on_card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection