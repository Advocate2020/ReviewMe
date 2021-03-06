@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="header-text">
            <h1>ReviewMe</h1>
            <h4>House of verified home & business products...</h4>
        </div>
        <div class="overlay" >
            <img src="https://cdn.pixabay.com/photo/2016/06/24/10/47/house-1477041_960_720.jpg" alt="" width="100%">
        </div>
    </header>
    <div style="padding-top: 25px">
        <main class="container">
            <h2 class="header-title">Latest Products</h2>

            <div class="row pt-5" style="color: white;">
                @foreach($products as $product)
                    <div class="col-4 pb-4">
                        <a href="/product/{{$product->slug}}">
                            <img src="/storage/{{ $product->image }}" class="w-100">
                        </a>
                        <p>
                            {{$product->created_at->diffForHumans()}}

                        </p>
                        <h4>
                            {{$product->name}}
                        </h4>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
@endsection
