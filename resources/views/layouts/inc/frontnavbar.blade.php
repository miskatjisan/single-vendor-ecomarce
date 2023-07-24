<section class="container">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="{{url('/')}}">Dream <span>Shop</span></a>
  <div class="search-bar">
    <form action="{{url('searchproducts')}}" method="POST">
      @csrf
    <div class="input-group ">
        
        <input type="search" class="form-control" id="search_product" require name="product_name" placeholder="Search your products" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    </form>

  </div>
  
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav  ms-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('category')}}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('cart')}}">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('blog')}}">Blog</a>
      </li>
      <!--
        <li class="nav-item">
        <a class="nav-link" href="{{url('wishlist')}}">Wishlist</a>
      </li>
     
      -->
     @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    Porfile
                                      
                                        </a>
                                        <a class="dropdown-item" href="{{url('my-orders')}}">
                                      My Orders
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

    </ul>
  </div>
</nav>
</section>