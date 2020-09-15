@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>List of orders</h2>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Card</th>
                        <th scope="col">Total, $</th>
                        <th scope="col">Products id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $value)
                    <tr>
                        <td><p class="card-title">{{ $loop->index+1 }}</p></td>
                        <td><p class="card-title">{{ $value->id }}</p></td>
                        <td><p class="card-title">{{ $value->billing_name }}</p></td>
                        <td><p class="card-title">{{ $value->billing_email }}</p></td>
                        <td><p class="card-title">{{ $value->billing_phone }}</p></td>
                        <td><p class="card-title">{{ $value->billing_address }}</p></td>
                        <td><p class="card-title">{{ $value->billing_name_on_card }}</p></td>
                        <td><p class="card-title">{{ $value->billing_total }}</p></td>
                        <td><p class="card-title">{{ $value->product_id }}</p></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection