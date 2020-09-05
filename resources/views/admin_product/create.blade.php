@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br/>
            <h4>Create product</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-admin-product-create')}}" method="post" 
                      enctype="multipart/form-data">
                    @csrf
                    <p>Name</p>
                    <input id="name" type="text" class="form-control 
                           @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" 
                           required="">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Price</p>
                    <input id="price" type="number" class="form-control 
                           @error('price') is-invalid @enderror" 
                           name="price" value="{{ old('price') }}" 
                           required="">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Quantity</p>
                    <input id="quantity" type="number" class="form-control 
                           @error('quantity') is-invalid @enderror" 
                           name="quantity" value="{{ old('quantity') }}" 
                           required="">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input id="img" type="file" multiple name="img">
                    </div>
                    <p>Status</p>
                    <select id="status" class="form-control 
                            @error('status') is-invalid @enderror" 
                            name="status" value="{{ old('status') }}">
                        <option value="In stock" selected="selected">In stock</option>
                        <option value="On order">On order</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Code</p>
                    <input id="code" type="text" class="form-control 
                           @error('code') is-invalid @enderror" 
                           name="code" value="{{ old('code') }}" 
                           required="">
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Is recommended</p>
                    <select id="is_recommended" class="form-control 
                            @error('is_recommended') is-invalid @enderror" 
                            name="is_recommended" value="{{ old('is_recommended') }}">
                        <option value="0" selected="selected">No</option>
                        <option value="1">Yes</option>
                    </select>
                    @error('is_recommended')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Description</p>
                    <textarea id="description" type="text" class="form-control 
                              @error('description') is-invalid @enderror" 
                              name="description" value="{{ old('description') }}" 
                              required=""></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Category</p>
                    <select id="category_id" class="form-control 
                            @error('category_id') is-invalid @enderror" 
                            name="category_id" value="{{ old('category_id') }}">
                        @foreach($categories as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
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