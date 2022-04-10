<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Wishlist;
use App\Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * 
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::get();
        //dd($wishlists);
         return view('cart', compact('cart'));
    }
    public function store($id){
        $cart = New Cart();
        $cart->image= $id->image;
        $cart->name = $id->name;
        $cart->price = $id->price;
        $cart->save();
        return redirect('/cart');

    }


    // public function store( $id)
    // {
        
    //     $wishlist = new Wishlist();
      
         
    

    //     $wishlist->name = $id->name;
    //     $wishlist->price = $id->price;
    

    //     $product->image = $name;

    //     $wishlist->save();
    //     return redirect('/wishlist')->with('success', 'wishlist Added');
    // }


}