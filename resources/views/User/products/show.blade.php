@extends('user.app.layout')

@section('content')



<div class="latest-products">
    <div class="container">
      <div class="row">

    <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="{{ asset("Storage/$product->image")}}" alt=""></a>
          <div class="down-content">
            <a href="#"><h4>T{{ $product->name }}</h4></a>
            <h6>{{ $product->price }}</h6>
            <p>{{ $product->desc }}</p>
           
            <span> quantity :{{ $product->quantity }}</span>
            <form action="{{ route('user-addToCart',$product->id) }}" method="post">
                @csrf
                <input type="number" name="qty" id="">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
              </form>
          </div>
        </div>
      </div>

@endsection