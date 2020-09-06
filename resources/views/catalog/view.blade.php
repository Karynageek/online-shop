@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <h4>Catalog</h4>
                    @foreach($categories as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('catalog-view',$value->id)}}">
                            <span data-feather="file"></span>
                            {{$value->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <h3 class="title text-center">Category </h3>
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">  
                            @foreach($products as $key => $value)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="{{ asset('storage/app/public/images/'.$value->image) }}">
                                    <div class="card-body">
                                        <p class="card-text">${{$value->price}}</p>
                                        <p class="card-text"><a href="/product/{{$value->id}}">
                                                {{$value->name}}
                                            </a></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if ($value->quantity > 0)
                                            <form action="/cart/{{$value->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>

@endsection