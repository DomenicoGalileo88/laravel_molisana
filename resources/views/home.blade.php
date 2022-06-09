<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>

<body>
    <header>
        <nav class="nav justify-content-center">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="/about">About</a>
        </nav>
    </header>

    <h1>{{$message}}</h1>

    <h2>Con forelse</h2>

    @forelse($posts as $post)
    <h3>{{$post}}</h3>
    @empty
    <p>Nothing to show </p>

    @endforelse

    <!-- Con for each e if -->
    <h2>Con if/else/foreach</h2>
    @if(count($posts) > 0)

    @foreach($posts as $post)
    <h3> {{$post}}</h3>
    @endforeach
    @else

    <p>Nothing to show </p>
    @endif
</body>

</html>
