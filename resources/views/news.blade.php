@extends('layouts.app')

@section('custom-css')
<link rel="stylesheet" href="{{asset('css/aboutme.css')}}">
@endsection

@section('content')
<div class="p-5 bg-light mb-4">
    <div class="container">
        <h1 class="display-3">My Blog</h1>
        <p class="lead">Read my latest news</p>
    </div>
</div>

<div class="container">
    <div class="row">

        @forelse($posts as $post)
        <div class="col">
            <div class="card">
                <img class="img-fluid" src="{{$post['img']}}" alt="">
                <h2 class="text-center">{{$post['title'] }}</h2>
            </div>
        </div>
        @empty
        <div class="col">
            <p>No posts yet!</p>
        </div>
        @endforelse

    </div>
</div>

@endsection
