<!DOCTYPE html>
<html>
  <head>
   @include('admin/head')
   <style>
    img{
        width: 80px;
        height: 50px;
    }
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

    }
    .body_con{
        margin-right: 20px;
        margin-left: 20px;
    }

    .table_head{
        margin-top: 5px;
        color: white;
        background-color: rgb(114, 114, 255);
    }
    .input_category {
        height: 40px;
        width: 400px;
        padding-bottom: 1px;
    }
</style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin/sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Orders</h2>
          </div>
        </div>

<div class="body_con">


        <div class="table_dego mt-4">
            <table class="table_deg table table-striped ">
                <thead>
                  <tr>
                    <th class="table_head" scope="col">Image</th>
                    <th class="table_head" scope="col">Costomer Name</th>
                    <th class="table_head" scope="col">Address</th>
                    <th class="table_head" scope="col">Phone</th>
                    <th class="table_head">Product Name</th>
                    <th class="table_head">Price</th>
                    <th class="table_head">Status</th>
                    <th class="table_head">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $data)

                    <tr>
                        <td>
                            <img src="{{asset('products/' . $data->product->image)}} " alt="">
                        </td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->name}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>{{$data->status}}</td>
                        <td><a href="" class="btn btn-danger">delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>

            </div>

        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script>
        function confirmDelete(event, form) {
            event.preventDefault();

            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to Delete this Category?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then(willDelete => {
                if (willDelete) {
                    form.submit();
                    swal("Deleted!", "Your imaginary file has been deleted!", "warning");
                }
                else{
                    swal("Safe!", "Your imaginary file Are Deleted!", "success");

                }
                });

        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src=" {{asset('adminsite/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src=" {{asset('adminsite/vendor/jquery/jquery.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src=" {{asset('adminsite/js/front.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('adminsite/vendor/chart.js/Chart.min.js')}}"></script>
    <script src=" {{asset('adminsite/js/charts-home.js')}}"></script>
  </body>
</html>
