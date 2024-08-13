<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
          @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{route('home.product_details', $product->id)}}">


              <div class="img-box">
                <img src="{{asset('products/'. $product->image)}}" alt="">
              </div>
              <div class="detail-box">
                  <h6>
                    {!!Str::limit($product->name, 15)!!}
                </h6>
                <h6>
                  Price
                  <span>
                    ${{$product->price}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
        </div>
    </div>
    @endforeach
      </div>
      <div class="btn-box">
        <a href="{{route('home.products')}}">
          View All Products
        </a>
      </div>
    </div>
  </section>
