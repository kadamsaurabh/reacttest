@extends('layouts.app')

@section('content')
<div class="container">
<div class="home-content">
    

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
      @csrf   
    <div class="form-group">
        <label for="">Country</label>
        <input type="text" class="form-control" id="country" name="country">
    </div>

    <div class="form-group">
        <label for="">State</label>
        <input type="text" class="form-control" id="state" name="state">
    </div>

    <div class="form-group">
        <label for="">City</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>

@endsection