<header id="site_header">

    @include('partials.logo')
    <nav class="nav justify-content-center">
        <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" href="{{route('home')}}">Home</a>

        <a class="nav-link {{ Route::currentRouteName() === 'products.index' || Route::currentRouteName() === 'products.show' ? 'active' : '' }}" href="{{route('products.index')}}">Prodotti</a>

        <a class="nav-link {{ Route::currentRouteName() === 'news' ? 'active' : '' }}" href="{{route('news')}}">News</a>

    </nav>
</header>
