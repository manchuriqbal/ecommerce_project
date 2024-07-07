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

        <section class="no-padding-top no-padding-bottom">
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
