
<html>
    <head>

    </head>
<body>
@include('layouts.app')

<h1>product detail page </h1>

<div class="container">
    <a href="/">Back</a><br><br>
    <h1></h1>
    <div class="row">
        <div class="col-sm-6">
            <img src="/image/img/{{ $product->image }}" alt="" width="500px" height="300px">
        </div>

        <div class="col-sm-6">
            <h1><b>{{$product->name}}</b></h1>
            <h3><b>Price</b> : {{$product->price}} </h3>
            <h3><b>Description</b> : {{$product->description}} </h3>
            <h3><b>Additional Info</b> : {{ $product->additional_info }}</h3>
           <button type="button" class="btn btn-primary">Add To Cart</button>


        </div>

    </div>





</div>


<div class="container">
    <br>
    <h1>Related Products :</h1>
    <br>
@foreach($productRelated as $key=>$data)
<div class="row">
    <div class="col-sm-6">
        <img src="/image/img/{{ $data->image }}" alt="" width="300px" height="200px">
    </div>   

    <div class="col-sm-6">
        <h2><b>{{$data->name}}</b></h2>
        <h4><b>Price</b> : {{$data->price}} </h4>
        <h4><b>Description</b> : {{$data->description}} </h4>
        <h4><b>Additional Info</b> : {{ $data->additional_info }}</h4>

    </div>
   

</div>
<br><br>

@endforeach
</div>




</body>

</html>

