<html>
<head>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
 -->

   <link rel="stylesheet" href="/css/bootstrap.css">

   
</head>
<body>
@extends('layouts.footer');

@section('content')
<div class="home-content">
    <a href="{{ route('slider.create') }}">Add Category</a>
    <!-- <a href="{{ url('category-create') }}">Add Category</a> -->

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($sliderData)>0)
            @foreach($sliderData as $key=>$data)
            <tr>
              
            <td><img src="image/img/{{ $data->image }}" alt="" width="80px" height="50px"></td>
                <td> <a href="{{route('slider.edit',$data->id)}}">Edit</a>  <a href="{{route('slider.delete',$data->id)}}">Delete</a></td>
            </tr>
            @endforeach
            @else
                <td>No data in table</td>
            @endif
           
        </tbody>
        <tfoot>
            <tr>
                
                <th>Image</th>
              
                <!-- <th>Description</th>
                <th>Image</th> -->
                <th>Action</th>


            </tr>
        </tfoot>
    </table>     
</div>
@endsection
</body>
</html>