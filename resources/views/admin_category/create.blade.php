@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br/>
            <h4>Create category</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-admin-category-create')}}" method="post" 
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

                    <p>Status</p>
                    <select id="status" class="form-control 
                            @error('status') is-invalid @enderror" 
                            name="status" value="{{ old('status') }}">
                        <option value="Hidden" selected="selected">Hidden</option>
                        <option value="Shown">Shown</option>
                    </select>
                    @error('interest_rate')
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