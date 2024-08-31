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
        margin: 60px 60px 60px 0px;
        }
    .table_deg {
        text-align: center;
        width: 1200px;

    }
    .body_con{
        display: flex;
        padding: 0px 100px;
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
    .amount_price {
        background: rgb(64, 64, 67);
        color: white;
    }
    .order_dego{
        padding: 80px 0px;
        margin-left: 50px;
    }
    label{
        width: 150px;
    }
    input[type='number'], input[type='text'], select, .image{
        width: 300px;
        height: 50px;
    }
    textarea{
        width: 300px;
        height: 100px;
    }
    .table_space{
        margin-top: 40px;
    }
    .no_cart{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 100px;
        padding: 100px;
    }
    .order_btn{
        float: right;
        margin-right: 35px;
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


@if ($count>0)


  <div class="body_con ">



    <div class="table_dego mt-10 col-md-7">
        <table class="table_deg table table-striped ">
            <thead>
              <tr>
                  <th class="table_head" scope="col">Image</th>
                  <th class="table_head" scope="col">Title</th>
                  <th class="table_head" scope="col">Price</th>
                  <th class="table_head" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                <?php
                $value = 0;
                ?>

                @foreach ($carts as $cart)
            <tr>

                <td>
                    <img width="100px" src="products/{{$cart->product->image}}" alt="">
                </td>
                <td>{{$cart->product->name}}</td>
                <td>{{$cart->product->price}}</td>

                <td>
                    <form action="{{route('home.cart_item_delete', $cart->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>

                <?php
                $value = $value + $cart->product->price;
                ?>
                @endforeach
            </tr>
            <tr >
                <td class="amount_price"></td>
                <td class="amount_price">Total Amount of Price</td>
                <td class="amount_price">{{$value}}</td>
                <td class="amount_price"></td>
            </tr>

            </tbody>
          </table>
    </div>






    <div class="order_dego col-md-4">
        <form action="{{route('home.add_order')}}" method="post">
            @csrf
            <div class="">
                <label for="">Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="table_space">
                <label for="">Address</label>
                <textarea name="address" cols="30" rows="10">{{Auth::user()->address}}</textarea>
            </div>
            <div class="table_space">
                <label for="">Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>



            <div class="table_space">
                <input class="order_btn btn btn-primary" type="submit" value="Cash On Delivery">
                <a href="{{route('stripe.get', $value)}}" class="btn btn-secondary">Pay Now on Card</a>
            </div>
        </form>
    </div>

</div>



@else

<div class="no_cart">
    <span>This user dosen't have any cart. please add some products on cart first. </span>
</div>


@endif






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
