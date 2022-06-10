@extends('layouts.app')

@section('content')

<div class="single_product bg-light">

    <div class="container py-5">

        <div class="row">
            <div class="col">
                <img width="600" src="{{$pasta['src-p']}}" alt="">
            </div>
            <div class="col">
                <div class="product_title d-flex">
                    <img width="50" src="{{$pasta['src-h']}}" alt="">
                    <h1 class="pb-2">{{$pasta['titolo']}}</h1>
                </div>
                <div class="content">
                    {!! $pasta['descrizione'] !!}
                </div>
                <hr>
                <div class="metadata">
                    <span>
                        <strong>Tipo: </strong>
                        {{$pasta['tipo']}}
                    </span>
                    <span>
                        <strong>Peso: </strong>
                        {{$pasta['peso']}}
                    </span>
                    <span>
                        <strong>Cottura: </strong>
                        {{$pasta['cottura']}}
                    </span>



                </div>
            </div>
        </div>
    </div>

</div>


@endsection
