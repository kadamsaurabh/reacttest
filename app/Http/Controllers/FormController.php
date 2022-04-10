<?php
use App\Form;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
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
        
        $categoryData = Category::all();


        //  echo "<pre>";
        //  print_r($categoryData);die;

        //view call
        return view('adminn.category.index',compact('categoryData'));
    }

    public function create()
    {
        return view('adminn.category.create');

    }
}
