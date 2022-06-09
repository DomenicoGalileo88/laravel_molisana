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
    $products = config('db.products');
    //dd($products);
    return view('products', compact('products'));
})->name('products');
