<?php
// echo "<pre>";
// print_r($subcategoryData);die;
?>

@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf   
    <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="image" name="image" >
    </div>

    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="form-group">
        <label for="">Additonal Info</label>
        <input type="text" class="form-control" id="additional_info" name="additional_info">
    </div>
    
    <div class="form-group">
        <label for="">Category ID</label>
        <!-- <input type="text" class="form-control" id="category_id" name="category_id"> -->

        <select name="category_id" id="category_id">
            @foreach($categoryData as $cData)
            <option value="{{$cData->id}}">{{$cData->name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="">SubCategory ID</label>
        <!-- <input type="text" class="form-control" id="subcategory_id" name="subcategory_id"> -->
        <select name="subcategory_id" id="subcategory_id">
            @foreach($subcategoryData as $scData)
            <option value="{{$scData->id}}">{{$scData->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div> -->


    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>

@endsection