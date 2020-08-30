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
                        <th scope="col">Status</th>
                        <th scope="col">Product ID</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $value)
                    <tr>
                        <td><p class="card-title">{{ $loop->index+1 }}</p></td>
                        <td><p class="card-title">{{ $value->id }}</p></td>
                        <td><p class="card-title">{{ $value->name }}</p></td>
                        <td><p class="card-title">{{ $value->email }}</p></td>
                        <td><p class="card-title">{{ $value->phone }}</p></td>
                        <td><p class="card-title">{{ $value->status }}</p></td>
                        <td><p class="card-title">{{ $value->product_id }}</p></td>
                        <td><a href="{{route('admin-order-edit', $value->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('admin-order-delete', $value->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection