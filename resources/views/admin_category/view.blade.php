@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>List of categories</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('admin-category-create')}}" class="btn btn-success">Create new category</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $value)
                    <tr>
                        <td><p class="card-title">{{ $loop->index+1 }}</p></td>
                        <td><p class="card-title">{{ $value->id }}</p></td>
                        <td><p class="card-title">{{ $value->name }}</p></td>
                        <td><p class="card-title">{{ $value->status }}</p></td>
                        <td><a href="{{route('admin-category-edit', $value->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('admin-category-delete', $value->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection