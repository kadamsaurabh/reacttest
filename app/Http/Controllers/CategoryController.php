<?php

namespace App\Http\Controllers;

//MOdel include
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch data using model(Category) 
        $categoryData = Category::all();


        //  echo "<pre>";
        //  print_r($categoryData);die;

        //view call
        return view('admin.category.index',compact('categoryData'));
    }

    public function create()
    {
        return view('admin.category.create');

    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());die;  

        $category = new Category();
      
        //image 
        if($file = $request->file('image')){
            $name = uniqid().$file->getClientOriginalName();
            $file->move('image/img/',$name);
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->image = $name;

        $category->save();
        return redirect('/category')->with('success', 'Category Added');

    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));

    }

   
  public function update(Request $request, $id)
    {
        //print_r(&request->all());

        $input = $request->all();
        //echo "hii";die;
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        //$category->image = $name;

        //if file == request image 
        //check datbase field of image 
        // use unlink function to remove image from image folder
        //add insert 
        
       if($request->hasfile('image')) 
        {
           $imagePath = ('image/img/'.$category->image);
            if(Category::exists($imagePath))
            {
                unlink($imagePath);
                
               // Category::delete($imagePath);
            }
            $file = $request->file('image');
            $name = uniqid().$file->getClientOriginalName();
            $file->move('image/img/',$name);

            $category->image = $name;
        }

        $category->update();
        return redirect('/category')->with('success', 'Data Updated successfully');

    }





    public function delete(Request $request, $id)
    {
       
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/category')->with('success', 'Data deleted successfully');
        
    }

}