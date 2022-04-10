<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\Category;
use App\Subcategory;
use App\Cart;
use App\Wishlist;

use Auth;
use DB;


class HomeController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('home');
    }

    public function welcome()
    {
        // echo "hii";die;
        $product = Product::all();
       $category = Category::all();
       $slider = Slider::all();
       $subcategory = Subcategory::all();
        return view('welcome', compact('product','category','slider','subcategory'));
    }




    // public function addToCart($id){
    //     $userid = Auth::user()->id;

       
    //      $cart = new Cart();

    //      $cart->user_id = $id;
    //      $cart->product_id = $id;
    //      $cart->save();

        
       
        
    // }

    public function addToCart($id){
        $userid = Auth::user()->id;

       // echo $userid;die;

        $cart =  new Cart();
        // echo "<pre>";
        // print_r($cart);die;
       
        $cart->user_id = $id;
        $cart->product_id = $id;
        $cart->save();
        
        // $product = Product::findOrFail($id);
      
        //  return view('cart', compact('id'));
       
    }

    public function moveToCart($id)
    {

        

        $userid = Auth::user()->id;

       // echo $userid;die;

        $cart =  new Cart();
        // echo "<pre>";
        // print_r($cart);die;
       
        $cart->user_id = $id;
        $cart->product_id = $id;
        $cart->save();

        DB::table('wishlist')->where('product_id', $id)->delete();

        // DB::table('wishlist')->where('id',$pro)->delete();


        return back();

        // $product = Product::findOrFail($id);
      
        //  return view('cart', compact('id'));
       
    }




    public function addToWishlist( $id){
        $userid = Auth::user()->id;

       // echo $userid;die;

        $wishlist =  new Wishlist();
        // echo "<pre>";
        // print_r($cart);die;
       
        $wishlist->user_id = $id;
        $wishlist->product_id = $id;
        $wishlist->save();


        

        
        // $product = Product::findOrFail($id);
      
        //  return view('cart', compact('id'));
       
    }




    public function searchProduct(Request $request){
        $searchProduct = $request->search;

        $product = Product::where('name','LIKE',"%$searchProduct%")->get();
        // echo "<pre>";
        // print_r($product);die;

      
        return view('search',compact('product','searchProduct'));
    }

 
}
