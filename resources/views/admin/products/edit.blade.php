@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf   
    <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="image" name="image" value="{{$product->image}}" >

        <img src="/image/img/{{ $product->image }}" alt="" width="80px" height="50px">
    </div>

    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
    </div>
    <div class="form-group">
        <label for="">Additonal Info</label>
        <input type="text" class="form-control" id="additional_info" name="additional_info" value="{{$product->additional_info}}">
    </div>
    
    <div class="form-group">
        <label for="">Category ID </label>
        <input type="text" class="form-control" id="category_id" name="category_id" value="{{$product->category_id}}">
    </div>
    <div class="form-group">
        <label for="">SubCategory ID </label>
        <input type="text" class="form-control" id="subcategory_id" name="subcategory_id" value="{{$product->subcategory_id}}">
    </div>

    <!-- <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div> -->


    <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
</div>

@endsection