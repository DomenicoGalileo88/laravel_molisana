@extends('layouts.app')

@section('content')
<section class="products container">
    <h1>Pasta</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @forelse($products as $pasta)
        <div class="col">
            <div class="product">
                <img class="img-fluid" src="{{$pasta['src']}}" alt="">
                <h5 class="pb-2">{{$pasta['titolo']}}</h5>
            </div>
        </div>

        @empty
        <div class="col">
            <p>No Products to show!</p>
        </div>

        @endforelse
    </div>

</section>


@endsection
