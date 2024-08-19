<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  @include('home.head')
  <style>
    .table_dego {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        }
    .table_deg {
        text-align: center;
        width: 1200px;

    }
    .body_con{
        margin-right: 20px;
        margin-left: 20px;
    }

    .table_head{
        margin-top: 5px;
        color: white;
        background-color: rgb(64, 64, 67);
    }
    th{
        border: 2px solid rgb(117, 109, 109);
    }
    td{
        border: 2px solid rgb(142, 133, 133);
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




  <div class="body_con ">
    <div class="table_dego mt-10">
        <table class="table_deg table table-striped ">
            <thead>
              <tr>
                  <th class="table_head" scope="col">Title</th>
                  <th class="table_head" scope="col">Price</th>
                  <th class="table_head" scope="col">Image</th>
                  <th class="table_head" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($carts as $cart)
            <tr>

                <td>{{$cart->product->name}}</td>
                <td>{{$cart->product->price}}</td>
                <td>
                    <img width="100px" src="products/{{$cart->product->image}}" alt="">
                  </td>

                <td>
                    <form action="{{route('home.cart_item_delete', $cart->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
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
