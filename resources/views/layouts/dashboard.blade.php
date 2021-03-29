<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="shortcut icon" href="/images/logo.png" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/css/fa/css/all.min.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
             <a href="{{ route('home') }}">
                 <img src="/images/logods.png" alt="" class="" style="width: 100px;"/>
             </a>
          </div>
          <div class="list-group list-group-flush my-5">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">
             <i class="far fa-play-circle"></i> My Video
            </a>
            <a href="{{ route('banner.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/banner*')) ? 'active' : '' }}">
             <i class="far fa-flag"></i> Banner
            </a>
             <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}">
               <i class="fas fa-drum"></i> Kategori Fullset
            </a>
            <a href="{{ route('suport.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/suport*')) ? 'active' : '' }}">
             <i class="far fa-hand-peace"></i></i> Support

            <hr class="" style="background-color: white;">

            <!--<a href="{{ route('dashboard-product') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}">-->
            <!--   <i class="fab fa-youtube"></i> Video Member-->
            <!--</a>-->
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">
               <i class="fab fa-youtube-square"></i> Manage Video
            </a>
               <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}">
               <i class="fas fa-users"></i> Member
            </a>
              <a target="_blank" href="{{ route('chatify') }}" class="list-group-item list-group-item-action ">
               <i class="fas fa-comments"></i> Chat Majelis
            </a>
            <a href="{{ route('sosial.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/sosial*')) ? 'active' : '' }}">
               <i class="far fa-user-circle"></i> Web Information




<hr class="" style="background-color: white;">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
               <i class="fas fa-home"></i> Home
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action">
             <i class="fas fa-sign-out-alt"></i> Sign Out
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </a>
          </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <button
                class="btn btn-light d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
               <span class="navbar-toggler-icon"></span>
              </button>

          </nav>

          {{-- Content --}}
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @include('sweetalert::alert')
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
