<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Subcategory;
use App\Wishlist;
use App\Cart;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        // echo "<pre>";
        // print_r($product);
        return view('admin.products.index',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('admin.products.create');
       $categoryData = Category::all();
       $subcategoryData = Subcategory::all();
       // print_r($categoryData);
        return view('admin.products.create',compact('categoryData','subcategoryData'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        //print_r($request->all());die;  

        $product = new Product();
      
         
        if($file = $request->file('image')){
            $name = uniqid().$file->getClientOriginalName();
            $file->move('image/img/',$name);
        }

        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->additional_info = $request->additional_info;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;

        $product->image = $name;

        $product->save();
        return redirect('/products')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //print_r(&request->all());

       $index = $request->all();
       //echo "hii";die;
       $product = Product::findOrFail($id);
       //$index['name'] = $request->name;

       $product->name = $request->name;
      

       $product->price = $request->price;
       $product->description = $request->description;
       $product->additional_info = $request->additional_info;
       $product->category_id = $request->category_id;
       $product->subcategory_id = $request->subcategory_id;
       //$category->image = $name;

       //if file == request image 
       //check datbase field of image 
       // use unlink function to remove image from image folder
       //add insert 
       
      if($request->hasfile('image')) 
       {
          $imagePath = ('image/img/'.$product->image);
           if(Product::exists($imagePath))
           {
               unlink($imagePath);
           }          
           $file = $request->file('image');
           $name = uniqid().$file->getClientOriginalName();
           $file->move('image/img/',$name);

           $product->image = $name;
       }

       $product->update();
       return redirect('/products')->with('success', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

   

    public function delete(Request $request, $id)
    {
       
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success', 'Data deleted successfully');
        
    }

    public function detail($id)
    {
       
        // $product = Product::findOrFail($id);
        // $product->delete();
        // return redirect('/products')->with('success', 'Data deleted successfully');

        // $product = Product::get();
        // return view('detail',compact('product'));


        // $data = Product::find($id);
        // return view('detail');

        // return Product::findOrFail($id);


        $product = Product::findOrFail($id);
      
        // return view('detail', compact('product'));

        $productCate = $product->category_id;

        $productRelated = Product::inRandomOrder()->where('category_id',$product->category_id)
                                                ->where('id','!=',$product->id)->limit(3)->get();

    //     echo "<pre>";

    //    print_r($productRelated);die;
        return view('detail', compact('product','productRelated'));


    }


    public function wishlist($id)
    {
        $product = Product::findOrFail($id);

      
    
        return view('wishlist', compact('product'));


    }


    public function cart($id)
    {
        $product = Product::findOrFail($id);

      
    
        return view('cart', compact('product'));


    }

    function list()
   {
       return Product::all();
   }

   


  
}