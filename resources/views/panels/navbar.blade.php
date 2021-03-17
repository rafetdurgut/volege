{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
          </ul>


        </div>
        <ul class="nav navbar-nav float-right">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
            <div class="search-input">
              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
              <input class="input" type="text" placeholder="Genel Arama..." tabindex="-1" data-search="template-search">
              <div class="search-input-close"><i class="bx bx-x"></i></div>
              <ul class="search-list"></ul>
            </div>
          </li>

          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name">
                  @if (Auth::user())
                  {{Auth::user()->name}}
                    @else
                    GİRİŞ YAPILMADI
                  @endif
                </span>
                <span class="user-status text-muted"> @if (Auth::user())
                  {{Auth::user()->role}}
                    @else
                    ROLSÜZ
                  @endif</span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a class="dropdown-item" href="{{asset('page/user/profile')}}">
                <i class="bx bx-user mr-50"></i> Profil Düzenle
              </a>
              <a class="dropdown-item" href="{{asset('app/email')}}">
                <i class="bx bx-envelope mr-50"></i> Mesaj Kutusu
              </a>
              <a class="dropdown-item" href="{{asset('app/todo')}}">
                <i class="bx bx-check-square mr-50"></i> Görevler</a>
                <a class="dropdown-item" href="{{asset('app/chat')}}"><i class="bx bx-message mr-50"></i> Mesajlar
              </a>
              <div class="dropdown-divider mb-0"></div>
              <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="dropdown-item"  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                 this.closest('form').submit();" ><i class="bx bx-power-off mr-50"></i> Çıkış Yap</a>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
