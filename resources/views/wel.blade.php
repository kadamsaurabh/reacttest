 <span><a href="{{ route('product.addToCart',$data->id) }}">Add To Cart</a></span>&#160;&#160; 



 @foreach($wishlists as $wishlist)

<h3 > {{$wishlist->name }}</h3>
<h4 > {{$wishlist->price }}</h4>

 @endforeach