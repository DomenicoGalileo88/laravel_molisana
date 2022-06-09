# Laravel First steps

- installa laravel
- avvia sever locale `php artisan serve` e `npm run watch`
- installa dipendenze npm `npm i`
- installa bootstrap `npm i bootstrap`
- creazione layout

## Creazine layout

Copiare contenuto del file welcome.blade.php nel file /views/layouts/app.blade.php (da creare).

Aggiungere dei segnaposto usando la direttiva blade `@yield('nome_del_segnaposto')`

Il file sará inizialmente cosi:

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


</head>

<body>
    <header></header>

    <!-- Aggiungo segnaposto per il contenuto principale -->
    <main>
        @yield('content')
    </main>

    <footer></footer>

</body>

</html>


```

Aggingere assets css usando la funzione `asset()` di laravel.
Dentro l'head aggiungere link

```html
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Se necessario aggiungere un'altro segnaposto per css customizzato per pagine -->
    @yield('custom-css')
```

Aggiungi script al file js pubblico al layout, prima della chiusura del tag body.

```html
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Se necessario aggiungere un'altro segnaposto per js customizzato per pagine -->
    @yield('script-footer')
```

Per aggiungere le immagini, creare cartella `img`` dentro `resources` e modificare file `webpack.mix.js` aggiungento questi metodi

```js
.copyDirectory('resources/img', 'public/img')
.sass('resources/sass/aboutme.scss', 'public/css')
    .options({
        processCssUrls: false
    });
```  

Il risultato sará:

```js
mix
.js('resources/js/app.js', 'public/js')
.copyDirectory('resources/img', 'public/img')
.sass('resources/sass/app.scss', 'public/css')
.options({
    processCssUrls: false
});
```

## Estendere il layout

Per Estendere il layout creare prima delle views

### crea rotta

Ad esempio rotta news che punta alla view news

```php
Route::get('/news', function () {
    return view('news');
})->name('news');
```

### crea view abbinata alla rotta

Dentro `resources/views/` crea file per la view chiamato ad esempio 
`news.blade.php`

ed estendi il layout `app`

```php
@extends('layouts.app')

@section('content')
<h1>My Blog</h1>
@endsection

```


## Stampare dei dati salvandoli in un file di config.

Creato nuovo file chiamato db.php dentro `/config`
che restituisce un array associativa di dati.


```php

return [
    'posts' => [
        [],
        [],
    ],
    'products' => [
        [],
        []
    ]
]

```

Per richiamare i dati contenuti in questo file si usa la funzione laravel `config('db.posts')` oppure `config('db.products')`
I dati li salviamo in una variabile e li passiamo alla view dentro alla closure della rotta.

Nel file web.php

```php

Route::get('/news', function () {
    $posts = config('db.posts');
    //dd($posts);
    return view('news', compact('posts'));
})->name('news');
```
