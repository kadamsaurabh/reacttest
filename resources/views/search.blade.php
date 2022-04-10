





<?php
echo "search";
?>



<div class="container">
    <br>
    <h1>Search Products :</h1>
    <br>
@foreach($product as $key=>$data)
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
