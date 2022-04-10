<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;

class WishlistController extends Controller
{
    //

    // public function index()
    // {
        
    //     $wish = Wishlist::all();


    //     //  echo "<pre>";
    //     //  print_r($categoryData);die;

    //     //view call
    //     return view('wishlist',compact('wish'));
    // }

       
    public function index()
{
   

    // $wishlists = Wishlist::with('product')
  
        //  $user = Auth::user();
    
        //  $wishlists = Wishlist::with('product')
        //       ->where('user_id', $user->id)
        //       ->orderby('id', 'desc')
        //       ->paginate(10);
        $wishlists = Wishlist::get();
    
         return view('wishlist', compact('wishlists'));


    
    //dd($wishlists);
    
}



    public function store( $id)
    {
        // echo "<pre>";
        //print_r($request->all());die;  

        $wishlist = new Wishlist();
      
         
    

        $wishlist->name = $id->name;
        $wishlist->price = $id->price;
    

        $product->image = $name;

        $wishlist->save();
        return redirect('/wishlist')->with('success', 'wishlist Added');
    }


    
}
