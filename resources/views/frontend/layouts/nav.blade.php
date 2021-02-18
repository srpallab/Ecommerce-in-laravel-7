<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
<div class="mobile-menu-container">
  <div class="mobile-menu-wrapper">
    <span class="mobile-menu-close">
      <i class="fa fa-icon-close"></i>
    </span>
    <nav class="mobile-nav">
      <ul class="mobile-menu">
	<li class="active">
	  <a href="{{route('home')}}">Home</a>
	</li>
	<li>
	  <a href="#">Shop</a>
	  <ul>
            <li><a href="{{ route('cart') }}">Cart</a></li>
            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
	    @auth 
              @if(Auth::user()->role=='admin')
                <li>
		  <a href="{{route('admin')}}"  target="_blank">Dashboard</a>
		</li>
              @else 
                <li>
		  <a href="{{route('user')}}"  target="_blank">Dashboard</a>
		</li>
              @endif
              <li>
		<a href="{{route('user.logout')}}">Logout</a>
	      </li>
              @else
              <li>
		<a href="{{route('login.form')}}">Login</a>
	      </li>
	      <li>
		<a href="{{route('register.form')}}">Register</a>
	      </li>
              @endauth
	  </ul>
	</li>
	<li>
	  <a href="{{route('product-grids')}}" class="sf-with-ul">Product</a>
	</li>
	<li>
	  <a href="#">Pages</a>
	  <ul>
            <li>
              <a href="{{ route('about-us') }}">About</a>
            </li>
            <li>
              <a href="{{ route('contact') }}">Contact</a>
            </li>
	  </ul>
	</li>
      </ul>
    </nav><!-- End .mobile-nav -->

    <div class="social-icons">
      <a href="#" class="social-icon" target="_blank" title="Facebook">
	<i class="fa fa-facebook"></i>
      </a>
      <a href="#" class="social-icon" target="_blank" title="Twitter">
	<i class="fa fa-twitter"></i>
      </a>
      <a href="#" class="social-icon" target="_blank" title="Instagram">
	<i class="fa fa-instagram"></i>
      </a>
      <a href="#" class="social-icon" target="_blank" title="Youtube">
	<i class="fa fa-youtube"></i>
      </a>
    </div><!-- End .social-icons -->
  </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->



<header class="header shop front-page">
  <!-- Topbar -->
  <div class="topbar">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12 col-12">
          <!-- Top Left -->
          <div class="top-left">
            <ul class="list-main">
              @php
              $settings=DB::table('settings')->get();
              
              @endphp
              <li>
		<i class="ti-headphone-alt"></i>
		@foreach($settings as $data) {{$data->phone}} @endforeach
	      </li>
              <li>
		<i class="ti-email"></i>
		@foreach($settings as $data) {{$data->email}} @endforeach
	      </li>
            </ul>
          </div>
          <!--/ End Top Left -->
        </div>
	<div class="col-lg-4 col-md-4 col-12">
          <div class="search-bar-top">
            <div class="search-bar front-search">
              <form method="POST" action="{{route('product.search')}}">
                @csrf
                <input name="search" placeholder="Search Products Here....."
		       type="search">
                <button class="btnn" type="submit">
		  <i class="ti-search"></i></button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
          <!-- Top Right -->
          <div class="right-content">
            <ul class="list-main">
              @auth 
              @if(Auth::user()->role=='admin')
                <li>
		  <i class="ti-user"></i>
		  <a href="{{route('admin')}}"  target="_blank">Dashboard</a>
		</li>
              @else 
                <li>
		  <i class="ti-user"></i>
		  <a href="{{route('user')}}"  target="_blank">Dashboard</a>
		</li>
              @endif
              <li>
		<i class="ti-power-off"></i>
		<a href="{{route('user.logout')}}">Logout</a>
	      </li>
              @else
              <li>
		<i class="ti-power-off"></i>
		<a href="{{route('login.form')}}">Login /</a>
		<a href="{{route('register.form')}}">Register</a>
	      </li>
              @endauth
            </ul>
          </div>
          <!-- End Top Right -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Topbar -->
  <div class="middle-inner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-2 col-12">
	  
          <!-- Logo -->
          <div class="logo">
            <div class="header-left">
	      <button class="mobile-menu-toggler">
		<span class="sr-only">Toggle mobile menu</span>
		<i class="fa fa-bars"></i>
	      </button>
	      <!-- Logo -->
      
	      @php
	      $settings=DB::table('settings')->get();
	      @endphp                    
	      <a href="{{route('home')}}">
		<img src="@foreach($settings as $data) {{$data->logo}} 
		@endforeach" alt="logo">
	      </a>
	      <!--/ End Logo -->
	    </div><!-- End .header-left -->
          </div>
          <!--/ End Logo -->
          <!-- Search Form -->
          <div class="search-top">
            <div class="top-search">
	      <a href="#0"><i class="ti-search"></i></a>
	    </div>
            <!-- Search Form -->
            <div class="search-top">
              <form class="search-form">
                <input type="text" placeholder="Search here..." name="search">
                <button value="search" type="submit">
		  <i class="ti-search"></i>
		</button>
              </form>
            </div>
            <!--/ End Search Form -->
          </div>
          <!--/ End Search Form -->
          <div class="mobile-nav"></div>
        </div>
        
        <div class="col-lg-6 col-md-3 col-12">
          <div class="right-bar">
            <!-- Search Form -->
            <div class="sinlge-bar shopping">
              @php 
              $total_prod=0;
              $total_amount=0;
              @endphp
              @if(session('wishlist'))
                @foreach(session('wishlist') as $wishlist_items)
                  @php
                  $total_prod+=$wishlist_items['quantity'];
                  $total_amount+=$wishlist_items['amount'];
                  @endphp
                @endforeach
              @endif
              <a href="{{route('wishlist')}}" class="single-icon">
		<i class="fa fa-heart-o"></i>
		<span class="total-count">{{Helper::wishlistCount()}}</span>
	      </a>
              <!-- Shopping Item -->
              @auth
              <div class="shopping-item">
                <div class="dropdown-cart-header">
                  <span>{{count(Helper::getAllProductFromWishlist())}} Items
		  </span>
                  <a href="{{route('wishlist')}}">View Wishlist</a>
                </div>
                <ul class="shopping-list">
                  {{-- {{Helper::getAllProductFromCart()}} --}}
                  @foreach(Helper::getAllProductFromWishlist() as $data)
                    @php
                    $photo=explode(',',$data->product['photo']);
                    @endphp
                    <li>
                      <a href="{{route('wishlist-delete',$data->id)}}"
			 class="remove" title="Remove this item">
			<i class="fa fa-remove"></i>
		      </a>
                      <a class="cart-img" href="#">
			<img src="{{$photo[0]}}" alt="{{$photo[0]}}">
		      </a>
                      <h4>
			<a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                      <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                    </li>
                  @endforeach
                </ul>
                <div class="bottom">
                  <div class="total">
                    <span>Total</span>
                    <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                  </div>
                  <a href="{{route('cart')}}" class="btn animate">Cart</a>
                </div>
              </div>
              @endauth
              <!--/ End Shopping Item -->
            </div>
            {{-- <div class="sinlge-bar">
			 <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                         </div> --}}
            <div class="sinlge-bar shopping">
              <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
              <!-- Shopping Item -->
              @auth
              <div class="shopping-item">
                <div class="dropdown-cart-header">
                  <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                  <a href="{{route('cart')}}">View Cart</a>
                </div>
                <ul class="shopping-list">
                  {{-- {{Helper::getAllProductFromCart()}} --}}
                  @foreach(Helper::getAllProductFromCart() as $data)
                    @php
                    $photo=explode(',',$data->product['photo']);
                    @endphp
                    <li>
                      <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                      <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                      <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                      <p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>
                    </li>
                  @endforeach
                </ul>
                <div class="bottom">
                  <div class="total">
                    <span>Total</span>
                    <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                  </div>
                  <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                </div>
              </div>
              @endauth
              <!--/ End Shopping Item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
