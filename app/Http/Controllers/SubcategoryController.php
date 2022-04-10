<?php

namespace App\Http\Controllers;

//MOdel include
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch data using model(Category) 
        $subcategoryData = Subcategory::all();


        //  echo "<pre>";
        //  print_r($categoryData);die;

        //view call
        return view('admin.subcategory.index',compact('subcategoryData'));
    }

    public function create()
    {
        return view('admin.subcategory.create');

    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());die;  

        $subcategory = new Subcategory();
      
        //image 
        // if($file = $request->file('image')){
        //     $name = uniqid().$file->getClientOriginalName();
        //     $file->move('image/img/',$name);
        // }

        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        // $category->description = $request->description;
        // $category->image = $name;

        $subcategory->save();
        return redirect('/subcategory')->with('success', 'Category Added');

    }


    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory'));

    }

   
  public function update(Request $request, $id)
    {
        //print_r(&request->all());

        $input = $request->all();
        //echo "hii";die;
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
       
        // $category->description = $request->description;
        
        //$category->image = $name;

        //if file == request image 
        //check datbase field of image 
        // use unlink function to remove image from image folder
        //add insert 
        
       

        $subcategory->update();
        return redirect('/subcategory')->with('success', 'Data Updated successfully');

    }





    public function delete(Request $request, $id)
    {
       
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect('/subcategory')->with('success', 'Data deleted successfully');
        
    }

}