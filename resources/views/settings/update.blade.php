@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br>
            <h4>Settings</h4>
            <br/>
        </div>
        <div class="col-lg-6">
            <div class="login-form">
                <form action="{{route('form-user-edit-nickname', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5>Change nickname</h5>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br/><br/>
                    <input type="submit" name="submit1" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
                <form action="{{route('form-user-edit-pass', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5>Change your password</h5>

                    <div class="form-group row">
                        <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="new-password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <br/><br/>
                    <input type="submit" name="submit2" class="btn btn-primary" value="Change">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection