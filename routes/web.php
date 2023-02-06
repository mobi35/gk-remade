<?php

use App\Models\User;
use Inertia\Inertia;
use Vanilo\Product\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

Route::get('/test', function () {

    // $product = Product::create([
    // 'name' => 'Dell Latitude E7240 Laptop',
    // 'sku'  => 'DLL-74237'
    // ]);


  $kuri =  Product::create([
    'name'             => 'Maxi Baxi 2000',
    'sku'              => 'MXB-2000',
    'stock'            => 123.4567,
    'price'            => 1999.95,
    'original_price'   => 2499.95,
    'weight'           => 1.3,
    'width'            => 27,
    'height'           => 21,
    'length'           => 60,
    'slug'             => 'maxi-baxi-2000',
    'excerpt'          => 'Maxi Baxi 2000 is the THING you always have dreamt of',
    'description'      => 'Maxi Baxi 2000 makes your dreams come true. See: https://youtu.be/5RKM_VLEbOc',
    'state'            => 'active',
    'meta_keywords'    => 'maxi, baxi, dreams',
    'meta_description' => 'The THING you always have dreamt of'
]);



    // $new = User::find(1);

    dd($kuri->stock);

    // $new = new User();
    // dd($new, 'kan');

});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
