@extends('layouts.app')

@section('content') 
<div class="container-fluid h-100">
    <div class="row align-items-center h-100">
        <div class="col-sm-12">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form action="{{route('form-admin-user-edit', $user->id)}}" method="post" class="form-signin">
                        @csrf
                        <h1 class="h3 mb-3 font-weight-normal text-center">Edit user# {{$user->id}} </h1>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">Save
                                    </button>
                                </div>   
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="{{route('admin-user-view')}}">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection