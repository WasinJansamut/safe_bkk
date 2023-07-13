<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ url('/home') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/icons/07.png') }}" width="100%">

            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg> --}}
                </div>
                <div class="logo-mini">
                    {{-- <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg> --}}
                </div>
            </div>
            <!--logo End-->

        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">สวัสดี</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('#') }}">
                        <i class="icon"><img src="{{ asset('assets/images/icons/07.png') }}" width="20"></i>
                        <span class="item-name">รายการทั้งหมด</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('customer_info') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('#') }}">
                        <i class="icon"><img src="{{ asset('assets/images/icons/07.png') }}" width="20"></i>
                        <span class="item-name">ข้อมูลผู้ใช้</span>
                    </a>
                </li>
                <li>
                    <hr class="hr-horizontal">
                </li>

            </ul>
            {{-- ---------------------------------- --}}
            {{-- Menu --}}
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">เมนู</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('#') }}">
                        <i class="icon"><img src="{{ asset('assets/images/icons/07.png') }}" width="20"></i>
                        <span class="item-name">หน้าหลัก</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/add_bill') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('#') }}">
                        <i class="icon"><img src="{{ asset('assets/images/icons/07.png') }}" width="20"></i>
                        <span class="item-name">รายการใหม่</span>
                    </a>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('logout') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/logout') }}" onclick="return confirm('Logout ?')">
                        <i class="icon"><img src="{{ asset('assets/images/icons/07.png') }}" width="20"></i>
                        <span class="item-name">ออกจากระบบ</span>
                    </a>
                </li>

            </ul>
            {{-- END Menu --}}
            <!-- Sidebar Menu End -->
        </div>
        <br><br><br><br><br><br><br><br><br>
    </div>
    <div class="sidebar-footer"></div>
</aside>
