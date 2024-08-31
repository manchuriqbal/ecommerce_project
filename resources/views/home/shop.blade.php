<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  @include('home.head')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->




  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
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
                <a href="{{route('home.add_to_cart', $product->id)}}">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
              </div>
            </a>
        </div>
    </div>
    @endforeach
      </div>
    </div>
  </section>








  <!-- contact section -->


  <br><br><br>

  <!-- end contact section -->



  <!-- info section -->
  @include('home.foter')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
