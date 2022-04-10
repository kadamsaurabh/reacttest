@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
      @csrf   
    <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$category->description}}">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file"   id="image" name="image" value="{{$category->image}}">

        <img src="/image/img/{{ $category->image }}" alt="" width="80px" height="50px">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>

@endsection