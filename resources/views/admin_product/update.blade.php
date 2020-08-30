@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br/>
            <h4>Edit product #{{$product->id}}</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-admin-product-edit', $product->id)}}" method="post" 
                      enctype="multipart/form-data">
                    @csrf
                    <p>Name</p>
                    <input id="name" type="text" class="form-control 
                           @error('name') is-invalid @enderror" 
                           name="name" value="{{$product->name}}" 
                           required="">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Price</p>
                    <input id="price" type="number" class="form-control 
                           @error('price') is-invalid @enderror" 
                           name="price" value="{{$product->price}}" 
                           required="">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Count</p>
                    <input id="count" type="number" class="form-control 
                           @error('count') is-invalid @enderror" 
                           name="count" value="{{$product->count}}" 
                           required="">
                    @error('count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Status</p>
                    <select id="status" class="form-control 
                            @error('status') is-invalid @enderror" 
                            name="status">
                        <option value="In stock" @if ($product->status == 'In stock') selected="selected" @endif >In stock</option>
                        <option value="On order" @if ($product->status == 'On order') selected="selected" @endif >On order</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Code</p>
                    <input id="code" type="text" class="form-control 
                           @error('code') is-invalid @enderror" 
                           name="code" value="{{$product->code}}" 
                           required="">
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Is new</p>
                    <select id="is_new" class="form-control 
                            @error('is_new') is-invalid @enderror" 
                            name="is_new">
                        <option value="0" @if ($product->is_new == 0) selected="selected" @endif >No</option>
                        <option value="1" @if ($product->is_new == 1) selected="selected" @endif >Yes</option>
                    </select>
                    @error('is_new')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Is recommended</p>
                    <select id="is_recommended" class="form-control 
                            @error('is_recommended') is-invalid @enderror" 
                            name="is_recommended">
                        <option value="0" @if ($product->is_recommended == 0) selected="selected" @endif >No</option>
                        <option value="1" @if ($product->is_recommended == 1) selected="selected" @endif >Yes</option>
                    </select>
                    @error('is_recommended')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Description</p>
                    <textarea id="description" type="text" class="form-control 
                              @error('description') is-invalid @enderror" 
                              name="description" 
                              required="">{{$product->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Category</p>
                    <select id="category_id" class="form-control 
                            @error('category_id') is-invalid @enderror" 
                            name="category_id"">
                        @foreach($categories as $key => $value)
                        <option value="{{ $value->id }}" @if ($product->category_id == $value->id) selected="selected" @endif >{{$value->name}}</option>
                        @endforeach
                    </select>
                    <br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection