@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
      @csrf   

    

    <div class="form-group">
        <label for="">Image</label>
       
        <input type="file"   id="image" name="image" value="{{$slider->image}}">

        <img src="/image/img/{{ $slider->image }}" alt="" width="80px" height="50px">
    </div> 

   




    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>

@endsection