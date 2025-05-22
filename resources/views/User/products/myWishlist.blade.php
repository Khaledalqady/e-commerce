@extends('user.app.layout')

@section('content')

<div class="col-md-4">
@if(session('wishlist'))
  @foreach ($wishlist as $id=>$product )

  <div class="product-item">
   <a href="#"><img src="{{ asset("storage") }}/{{ $product['image'] }}" alt=""></a>
   <div class="down-content">
    <a href=""><h4>{{ $product['name'] }}</h4></a>
    <h6>{{ $product['price'] }}</h6>
   
   </div>
  </div>
  

  @auth

  <form action="{{ route('user-addToCart',$id) }}" method="post">
    @csrf
    <input type="date" name="requireDate" id="">
    <button type="submit">add to cart</button>
</form>
  @endauth

  @endforeach

  @endif



</div>
    
@endsection