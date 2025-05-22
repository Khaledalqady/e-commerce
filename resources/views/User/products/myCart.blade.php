@extends('user.app.layout')

@section('content')

<div class="col-md-4">

  @foreach ($cart as $id=>$product )

  <div class="product-item">
   <a href="#"><img src="{{ asset("storage") }}/{{ $product['image'] }}" alt=""></a>
   <div class="down-content">
    <a href=""><h4>{{ $product['name'] }}</h4></a>
    <h6>{{ $product['price'] }}</h6>
    <span>qantity : {{ $product['qty'] }}</span>
   </div>
  </div>
  
  @endforeach


<form action="{{ route('user-makeorder') }}" method="post">
    @csrf
    <input type="date" name="requireDate" id="">
    <button type="submit">Make Order</button>
</form>



</div>
    
@endsection