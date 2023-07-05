  <!--Nav Start-->
  <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
      <div class="container-fluid navbar-inner">
          <a href="" class="navbar-brand">
              <!--Logo start-->
              {{-- <img src="{{ asset('assets/images/logo-bg-w.png') }}" width="100"> --}}
              <!--logo End-->
              {{-- <img src="{{ asset('assets/images/logo-bg-w.png') }}" width="100"> --}}

              <!--logo End-->

              {{-- <h4 class="logo-title">ST168</h4> --}}
          </a>
          <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
              <i class="icon">
                  <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                      <path fill="currentColor"
                          d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                  </svg>
              </i>
          </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="ture"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                  <span class="mt-2 navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
              </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                  <li class="nav-item dropdown">
                      <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                          role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{-- <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                          <img src="../../assets/images/avatars/avtar_1.png" alt="User-Profile" class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                          <img src="../../assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                          <img src="../../assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                          <img src="../../assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                          <img src="../../assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded"> --}}
                          <div class="caption ms-3 d-none d-md-block ">
                              <h6 class="mb-0 caption-title">{{ Auth::user()->name ?? '-' }}</h6>
                              <p class="mb-0 caption-sub-title">-</p>
                          </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ url('logout') }}">ออกจากระบบ</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav> <!-- Nav Header Component Start -->
  <!--Nav End-->
