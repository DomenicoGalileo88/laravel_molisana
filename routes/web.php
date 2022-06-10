<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/news', function () {
    $posts = config('db.posts');
    //dd($posts);
    return view('news', compact('posts'));
})->name('news');

Route::get('/products', function () {
    $products_data = config('db.products');
    //dd($products);
    /* Filtra le paste per tipo Versione con array Filter!
    $paste_lunghe =  array_filter($products, function ($el) {
        return $el['tipo'] === 'lunga';
    });
    $paste_corte =  array_filter($products, function ($el) {
        return $el['tipo'] === 'corta';
    });
    $paste_cortissime =  array_filter($products, function ($el) {
        return $el['tipo'] === 'cortissima';
    });*/

    /* Filtra le paste per tipo usando una collection */
    $products_collection = collect($products_data);
    $lunghe = $products_collection->where('tipo', 'lunga');
    $corte = $products_collection->where('tipo', 'corta');
    $cortissime = $products_collection->where('tipo', 'cortissima');

    //dd($lunghe, $corte, $cortissime);

    //dd($paste_lunghe, $paste_corte, $paste_cortissime);

    $products = [
        'lunghe' => $lunghe,
        'corte' => $corte,
        'cortissime' => $cortissime
    ];

    return view('products.index', compact('products'));
})->name('products.index');


Route::get('/products/{id}', function ($id) {
    $products = config('db.products');
    //dd(count($products));
    if ($id >= 0 && is_numeric($id) && $id < count($products)) {
        //dd($id);
        //dd($products[$id]);
        $pasta = $products[$id];
        return view('products.show', compact('pasta'));
    } else {
        //dd('Abort! 404');
        abort(404);
    }
})->name('products.show');
