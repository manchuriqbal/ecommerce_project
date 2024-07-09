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
            <h2 class="h5 no-margin-bottom">Update Category</h2>
          </div>
        </div>

        <section class="no-padding-top no-padding-bottom mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="input-container">
                        <form action="{{route('category.update', $data->id)}}" method="post">
                            @csrf
                            @method('put')
                            <input class="input_category mr-2" type="text" name="category" value="{{$data->category_name}}">
                            <input class="btn btn-success" type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="table_dego">


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
