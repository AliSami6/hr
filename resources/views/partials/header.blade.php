 <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
     <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
         <h1 class="m-0"> <img src="{{ url('uploads/front/' . $front_setting->logo) }}" alt=""
                 style="height: 90px;" /></h1>
     </a>
     <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ isRouteActive('home') ? 'active' : '' }}">Home</a>
            <a href="{{url('about')}}" class="nav-item nav-link {{ isRouteActive('about') ? 'active' : '' }}">About</a>
            <a href="{{url('services')}}" class="nav-item nav-link {{ isRouteActive('services') ? 'active' : '' }}">Services</a>
            <a href="{{url('creer')}}" class="nav-item nav-link {{ isRouteActive('creer') ? 'active' : '' }}">Career</a>
            <a href="{{url('products')}}" class="nav-item nav-link {{ isRouteActive('products') ? 'active' : '' }}">Products</a>
            <a href="{{url('contact')}}" class="nav-item nav-link {{ isRouteActive('contact') ? 'active' : '' }}">Contact</a>
              @if(Auth::check())
                <a href="{{url('dashboard')}}" class="nav-item nav-link">Dashboard</a>
                <a href="{{url('logout')}}" class="nav-item nav-link">Logout</a>
            @else
                <a href="{{url('login')}}" class="nav-item nav-link {{ isRouteActive('login') ? 'active' : '' }}">Log in</a>
            @endif
         </div>
        <div class="border-start ps-4 d-none d-lg-block">
            <a href="{{url('cart')}}" role="button" class="btn btn-sm p-0 text-danger">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                    class="badge bg-danger rounded-pill">{{ count((array) session('cart')) }}</span>
            </a>
        </div>
     </div>
 </nav>
