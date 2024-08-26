<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  @include('home.head')

  <style>

    .input-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;

    }


    .no-padding-top {
        padding-top: 0;
    }

    .no-padding-bottom {
        padding-bottom: 0;
    }
    .table_dego {

        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .table_deg {
        text-align: center;
        margin: 0px 70px;


    }
    .body_con{

        margin: 100px 20px;
    }

    .table_head{
        margin-top: 5px;
        color: rgb(197, 193, 193);
        background-color: rgb(55, 55, 56);
    }
    .input_category {
        height: 40px;
        width: 400px;
        padding-bottom: 1px;
    }
    img{
        width: 100px;
        height: 100px;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->



<div class="body_con">


    <div class="table_dego mt-4">
        <table class="table_deg table table-striped ">
            <thead>
              <tr>
                <th class="table_head" scope="col">Image</th>
                <th class="table_head" scope="col">Product Name</th>
                <th class="table_head" scope="col">Price</th>
                <th class="table_head" scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders  as $order)

                <tr>
                    <td>
                        <img src="{{asset('products/' . $order->product->image)}}" alt="">
                    </td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>
                        @if ($order->status == "delivered")
                            <span style="color: rgb(52, 228, 52)">Delivered</span>
                        @elseif ($order->status =="on_the_way")
                            <span style="color: rgb(0, 0, 0)">On The Way</span>
                        @else
                            <span style="color: rgb(213, 42, 42)">In Process</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>

        </div>




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
