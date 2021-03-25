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

    @stack('perpend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link href="/css/fa/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    @stack('addon-style')
    
    <style>
        .nav-link{
            color:#000000 !important;
        }
    </style>
  </head>

  <body>
    <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center mb-5">
             <a href="{{ route('home') }}">
                 <img src="/images/logods.png" alt="" class="" style="width: 100px;"/>
             </a>
          </div>
            <div class="list-group list-group-flush mt-5">
            <a href="{{ route('member-dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('member')) ? 'active' : '' }} ">
               <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('profile.index') }}" class="list-group-item list-group-item-action {{ (request()->is('member/profile')) ? 'active' : '' }}">
               <i class="fas fa-user"></i> Profile
            </a>
            <a href="{{ route('video.index') }}" class="list-group-item list-group-item-action {{ (request()->is('member/video')) ? 'active' : '' }}">
               <i class="far fa-file-video"></i> Kirim Video
            </a>
            <a href="{{ route('videos.index') }}" class="list-group-item list-group-item-action {{ (request()->is('member/videos')) ? 'active' : '' }}">
               <i class="fas fa-video"></i> Video Saya
            </a>
            <a href="{{ route('supports.index') }}" class="list-group-item list-group-item-action {{ (request()->is('member/supports')) ? 'active' : '' }}">
               <i class="fas fa-headset"></i> Support
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
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-flex ml-auto mr-5">
                  <li class="nav-item dropdown">
                    <a
                      href="#"
                      class="nav-link text-uppercase"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                    >
                      {{-- <img
                        src="/images/users/user.svg"
                        alt=""
                        class="rounded-circle profile-picture"
                      /> --}}
                       <i class="far fa-user-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                      <a class="dropdown-item" href="{{ route('user.password.edit') }}"
                      >Ubah Password</a
                    >
                      <div class="dropdown-divider"></div>
                       
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                          class="dropdown-item">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          </nav>

          <!-- section content -->
          @yield('content')
        </div>
      </div>
    </div>
    @include('sweetalert::alert')

    <!-- Bootstrap core JavaScript -->
    @stack('perpend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $('#menu-toggle').click(function (e){
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
      });
    </script>
    @stack('addon-script')
  </body>
</html>
