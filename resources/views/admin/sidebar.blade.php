<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('adminsite/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('category.create')}}"> <i class="icon-grid"></i>Categories </a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="https://www.google.com/">Home</a></li>
                <li><a href="https://www.facebook.com/">Contact Us</a></li>
                <li><a href="https://github.com/">About Us</a></li>
            </ul>
            </li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                <li><a href="https://www.google.com/">Laptap</a></li>
                <li><a href="https://www.facebook.com/">Mobile</a></li>
                <li><a href="https://github.com/">Macbook</a></li>
            </ul>
            </li>
    </ul>
  </nav>
