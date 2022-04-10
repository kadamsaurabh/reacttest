<?php

namespace App\Http\Controllers;

//MOdel include
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch data using model(Category) 
        $sliderData = Slider::all();


        //  echo "<pre>";
        //  print_r($categoryData);die;

        //view call
        return view('admin.slider.index',compact('sliderData'));
    }

    public function create()
    {
        return view('admin.slider.create');

    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());die;  

        $slider = new Slider();
      
        //image 
        if($file = $request->file('image')){
            $name = uniqid().$file->getClientOriginalName();
            $file->move('image/img/',$name);
        }

       
        // $slider->image = $request->image;

      
        $slider->image = $name;

        $slider->save();
        return redirect('/slider')->with('success', 'Category Added');

    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));

    }

   
  public function update(Request $request, $id)
    {
        //print_r(&request->all());

        $input = $request->all();
        //echo "hii";die;
        $slider = Slider::findOrFail($id);

    
        // $slider->image = $request->image;
       
        //$category->image = $name;

        //if file == request image 
        //check datbase field of image 
        // use unlink function to remove image from image folder
        //add insert 
        
       if($request->hasfile('image')) 
        {
           $imagePath = ('image/img/'.$slider->image);
            if(Slider::exists($imagePath))
            {
                unlink($imagePath);
                
               // slider::delete($imagePath);
            }
            $file = $request->file('image');
            $name = uniqid().$file->getClientOriginalName();
            $file->move('image/img/',$name);

            $slider->image = $name;
        }

        $slider->update();
        return redirect('/slider')->with('success', 'Data Updated successfully');

    }





    public function delete(Request $request, $id)
    {
       
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect('/slider')->with('success', 'Data deleted successfully');
        
    }

}