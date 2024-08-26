<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home.home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.html">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        <div class="user_option">

            @if (Route::has('login'))
            @auth


            <a href="{{route('home.my_order')}}" class="spacing">
                Order<span class="cart_count">(1)</span>
            </a>


            <form class="spacing" method="POST" action="{{ route('logout') }}">
                @csrf

                <i class="fa fa-user" aria-hidden="true"></i>
                <input class="list-inline-item btn btn-secoundary" type="submit" value="logout">
            </form>

            <a href="{{route('home.my_cart')}}" class="spacing">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> <span class="cart_count">({{$count}})</span>
            </a>

            @else

            <form class="spacing" method="GET" action="{{ route('login') }}">
                @csrf
                <i class="fa fa-user" aria-hidden="true"></i>
                <input  class="list-inline-item btn btn-secoundary" type="submit" value="Login"> <i class="icon-logout"></i>
            </form>

            <form class="spacing" method="GET" action="{{ route('register') }}">
                @csrf
                <i class="fa fa-vcard" aria-hidden="true"></i>
                <input class="list-inline-item btn btn-secoundary" type="submit" value="Register"> <i class="icon-logout"></i>
            </form>


            @endauth
            @endif


          <form class="form-inline ">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>
