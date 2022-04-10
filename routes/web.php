<?php

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

// Route::get('/', function () {
    
//     return view('welcome');
// });
Route::get('/','HomeController@welcome')->name('product');
Route::get('/','HomeController@welcome')->name('slider');
Route::get('/','HomeController@welcome')->name('category');
Route::get('/','HomeController@welcome')->name('subcategory');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Auth::routes();
//url,Controllername,FunctionName
Route::get('/user', 'UserController@index')->name('user');




//Route::get('/form', 'FormController@index')->name('form');


//dashboard
// Route::get('/home', function () {
    
//     return view('home');
// });

Route::get('/category','CategoryController@index');

Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category-store','CategoryController@store')->name('category.store');

Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('/category/{id}/update', 'CategoryController@update')->name('category.update');

Route::get('/category/{id}/delete', 'CategoryController@delete')->name('category.delete');




Route::get('/form','FormController@index');
Route::get('/form/create','FormController@create')->name('form.create');



Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@create')->name('products.create');
Route::post('/products-store','ProductController@store')->name('products.store');
Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
Route::post('/products/update/{id}','ProductController@update')->name('products.update');
Route::get('/products/delete/{id}','ProductController@delete')->name('products.delete');


Route::get('/subcategory','SubcategoryController@index');

Route::get('/subcategory/create','SubcategoryController@create')->name('subcategory.create');
Route::post('/subcategory-store','SubcategoryController@store')->name('subcategory.store');

Route::get('/subcategory/{id}/edit', 'CSubcategoryController@edit')->name('subcategory.edit');
Route::post('/subcategory/{id}/update', 'SubcategoryController@update')->name('subcategory.update');

Route::get('/subcategory/{id}/delete', 'SubcategoryController@delete')->name('subcategory.delete');



Route::get('/slider','SliderController@index');
Route::get('/slider/create','SliderController@create')->name('slider.create');
Route::post('/slider-store','SliderController@store')->name('slider.store');
Route::get('/slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
Route::post('/slider/{id}/update', 'SliderController@update')->name('slider.update');
Route::get('/slider/{id}/delete', 'SliderController@delete')->name('slider.delete');


// Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');

Route::get('detail/{id}','ProductController@detail')->name('detail');

 
Route::get('/addToCart/{id}','HomeController@addToCart')->name('product.addToCart');

Route::get('/moveToCart/{id}','HomeController@moveToCart')->name('product.moveToCart');

// Route::get('cart/{id}','HomeController@addToCart')->name('cart');

Route::get('/addToWishlist/{id}','HomeController@addToWishlist')->name('product.addToWishlist');



Route::post('/search','HomeController@searchProduct')->name('product.search');

// Route::get('/wishlist','ProductController@wishlist')->name('wishlist');



// Route::get('cart/{id}','HomeController@addToCart')->name('cart');

// Route::get('wishlist/{id}','ProductController@wishlist')->name('wishlist');

Route::get('/wishlist','WishlistController@index')->name('wishlist');

Route::post('/wishlist-store','WishlistController@store')->name('wishlist.store');


Route::get('/cart','CartController@index')->name('cart');

Route::post('/cart-store','CartController@store')->name('cart.store');










