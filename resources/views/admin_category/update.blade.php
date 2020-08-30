@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br>
            <h4>Edit category #{{$category->id}}</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-admin-category-edit', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>Name</p>
                    <input type="text" @error('name') is-invalid @enderror" name="name" required="" value="{{$category->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Status</p>
                    <select name="status">
                        <option value="Hidden" @if ($category->status == 'Hidden') selected="selected" @endif >Hidden</option>
                        <option value="Shown" @if ($category->status == 'Shown') selected="selected" @endif >Shown</option>
                    </select>
                    @error('sum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br/><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection