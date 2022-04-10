@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
      @csrf   
    <div class="form-group">
        <label for="">category_id</label>
        <input type="text" class="form-control" id="category_id" name="category_id">
    </div>

    <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <!-- <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="image" name="image" >
    </div> -->


    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>

@endsection