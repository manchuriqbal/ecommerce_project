<!DOCTYPE html>
<html>
  <head>
   @include('admin/head')
   <style>
    .input-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .input_category {
        height: 40px;
        width: 400px;
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
        width: 500PX;
    }
    .table_head{
        margin-top: 5px;
        color: white;
        background-color: green;
    }
    th{

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
            <h2 class="h5 no-margin-bottom">Add Category</h2>
          </div>
        </div>

        <section class="no-padding-top no-padding-bottom mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="input-container">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <input class="input_category mr-2" type="text" name="category">
                            <input class="btn btn-success" type="submit" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="table_dego">
            <table class="table_deg table table-striped ">
                <thead>
                  <tr>
                    <th class="table_head" scope="col">Category</th>
                    <th class="table_head" scope="col">Update</th>
                    <th class="table_head">action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $categories )
                    <tr>
                        <td>{{$categories->category_name}}</td>
                        <td><a href="{{route('category.edit', $categories->id)}}" ><button class="btn btn-info" type="submit">Edit</button></a></td>
                       <td>
                        <form action="{{route('category.delete', $categories->id)}}" onsubmit="return confirmDelete(event, this)" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
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
