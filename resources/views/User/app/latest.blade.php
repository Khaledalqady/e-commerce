<div class="latest-products">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        @foreach ($products as $product )
        <div class="col-md-4">
          <div class="product-item">
            <a href={{  route('user-show-product',$product->id)}}><img src="{{ asset("Storage/$product->image")}}" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>T{{ $product->name }}</h4></a>
              <h6>{{ $product->price }}</h6>
              <p>{{ $product->desc }}</p>
             
              <span> quantity :{{ $product->quantity }}</span>

              <form action="{{ route('user-addToWishList',$product->id) }}" method="post">
                @csrf
                
                <button type="submit" class="btn btn-secondary">Add to WishList</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="{{ asset("storage") }}/{{ $product->image }}" alt=""></a>
            <div class="down-content">
              <a href="{{ route('user-show-product',$product->id) }}"><h4>Tittle goes here</h4></a>
              <h6>{{ $product->price }}</h6>
              <p>{{ $product->desc }}</p>
              <p>{{ $product->created_at }}</p>

             
              <span> {{ $product->quantity }}
              </span>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Tittle goes here</h4></a>
              <h6>$20.45</h6>
              <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (36)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Tittle goes here</h4></a>
              <h6>$15.25</h6>
              <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (48)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Tittle goes here</h4></a>
              <h6>$12.50</h6>
              <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (16)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Tittle goes here</h4></a>
              <h6>$22.50</h6>
              <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (32)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>