
<nav
    class="navbar navbar-expand-lg navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down">
    <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="/images/logo-nav-new.png" alt="Logo" / style="width: 150px;">
    </a>

    <span
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
    >
        <i class="fas fa-stream text-white"></i>
    </span>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto mb-2">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
                <a target="_blank" rel="noopener noreferrer"  class="nav-link"  href="https://www.lapakanik.com/">About</a>
            </li>
            <li class="nav-item">
                <a target="_blank" rel="noopener noreferrer" href="https://www.lapakanik.co.id/" class="nav-link">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}" href="{{ route('categories') }}">Video</a>
            </li>
            <li class="nav-item">
                <a target="_blank" rel="noopener noreferrer" href="https://www.lapakanik.co.id/blog/" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('panduan') }}" class="nav-link {{ (request()->is('panduan')) ? 'active' : '' }}">Panduan</a>
            </li>

            <li class="divider"></li>

            @guest
                <!--<li class="nav-item">-->
                <!--    <a href="{{ route('login') }}" class="btn warning btn-member nav-link px-4"><i class="fas fa-cloud-upload-alt"></i> Upload Gratis</a>-->
                <!--</li>-->

                <div class="btn-group">
                  <button type="button" class="btn warning btn-member nav-link px-4 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cloud-upload-alt"></i> Upload Gratis
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
                 </div>
                </div>
            @endguest
        </ul>

        @auth
          <!-- Desktop Menu -->
         <ul class="navbar-nav d-none d-lg-flex mb-2">

            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >

                {{-- <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                /> --}}
                HI, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                  @if ( Auth::user()->id != 1)
                  <a href="{{ route('member-dashboard') }}" class="dropdown-item">Dashboard</a>
                  @else
                  <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                  @endif


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
            <li class="nav-item">

            </li>
          </ul>

          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item nav-item dropdown">
                {{-- <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                /> --}}
                 @if ( Auth::user()->id != 1)
                  <a href="{{ route('member-dashboard') }}" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                  @else
                  <a href="{{ route('dashboard') }}" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                  @endif
            </li>

          </ul>
        @endauth
    </div>
    </div>
</nav>
