@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br></br>
                    <p>You are logged in {{Auth::user()->name}} !</p>
                    <p>Count of your deposit: {{$count}}.</p>
                    <p>Total sum of your deposit: ${{$total_sum}}.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
