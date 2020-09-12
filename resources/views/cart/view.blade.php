@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>

        @if($products)
        @foreach($products as $key => $value)

        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ $value['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $value['name'] }}</h4>
                    </div>
                </div>
            </td>
    <form action="{{route('cart-update', $key) }}" method="post">
        @csrf
        <td data-th="Price">${{ $value['price'] }}</td>
        <td data-th="Quantity">
            <input type="number" name ="quantity" value="{{ $value['quantity'] }}" class="form-control quantity" />
        </td>
        <td data-th="Subtotal" class="text-center">${{ $value['price'] * $value['quantity'] }}</td>
        <td class="actions" data-th="">           
            <button class="btn btn-info btn-sm update-cart" type="submit">Update</button>
            <a href="{{route('cart-delete', $key) }}" class="btn btn-danger btn-sm remove-from-cart">Delete</a>
    </form>
</td>
</tr>
@endforeach
@endif

</tbody>
<tfoot>
    <tr>
        <td>
            <a href="{{ route('shop-view') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <a href="{{ route('order-create') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Checkout</a>
        </td>

        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
    </tr>
</tfoot>
</table>

@endsection