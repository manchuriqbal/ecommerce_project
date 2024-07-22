
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  @include('home.head')
  <style>
    .detail-products h6 span{
        color: red;
    }
    .detail-products h5{
        font: bold;
    }
    .card_btn{
        display:flex;
        justify-content: center;
        text-align: center;
    }
    .card_btn a {
        margin-top: 30px;
        padding: 10px 525px 10px 525px;
        color: white;

    }
  </style>
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
        <h3>{{$product->name}}</h3>
      </div>
      <div class="row">

        <div class=" col-md-12">
          <div class="box">
              <div class="img-box">
                <img class="product_image" src="{{asset('products/'. $product->image)}}" alt="">
              </div>
              <div class="detail-products">
                <h6>Price: <span>${{$product->price}}</span></h6>
                <h6>Category: <span>{{$product->category}}</span></h6>
                <h6>Quantity: <span>{{$product->quantity}}</span></h6>
                <h6>Description: <p>{{$product->description}}</p></h6>
              </div>

        </div>
        <div class="card_btn">
            <a class="btn btn-secondary" href="">Add To Cart</a>
        </div>
    </div>

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
