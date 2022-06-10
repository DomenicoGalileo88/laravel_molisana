@extends('layouts.app')

@section('content')
<div class="products">
    <div class="container">

        @foreach($products as $type => $data)
        <h2>{{$type}}</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            @forelse($data as $index => $pasta)
            <div class="col">
                <a href="{{route('products.show', $index)}}">
                    <div class="product">
                        <img class="img-fluid" src="{{$pasta['src']}}" alt="">
                        <h5 class="pb-2">{{$pasta['titolo']}}</h5>
                    </div>
                </a>
            </div>

            @empty
            <div class="col">
                <p>No Products to show!</p>
            </div>

            @endforelse
        </div>
        @endforeach

    </div>
</div>


@endsection
