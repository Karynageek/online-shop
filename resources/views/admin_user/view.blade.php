@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>List of users</h2>
            </div>
            <div class="col-md-4">
                <form action="{{route('admin-user-search')}}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="form-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span> 
                    </div>
                </form>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{route('admin-user-create')}}" class="btn btn-success">Create new user</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Date create</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $value)
                    <tr>
                        <td><p class="card-title">{{ $loop->index+1 }}</p></td>
                        <td><p class="card-title">{{ $value->id }}</p></td>
                        <td><p class="card-title">{{ $value->created_at }}</p></td>
                        <td><p class="card-title">{{ $value->name }}</p></td>
                        <td><p class="card-title">{{ $value->email }}</p></td>
                        <td><a href="{{route('admin-user-edit', $value->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('admin-user-delete', $value->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
    @endsection