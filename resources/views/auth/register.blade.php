<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>สมัครสมาชิก : {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=2.0.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=2.0.0') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />

    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.4.0-web/css/all.min.css') }}" />

    @yield('style')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/images/loader.gif') }}" class="rounded-circle" width="400">
            </div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../../assets/images/auth/05.png" class="img-fluid gradient-main animated-scaleX"
                        alt="images">
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                                <div class="card-body">
                                    <a href="../../dashboard/index.html"
                                        class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4"
                                                        rx="2" transform="rotate(-45 -0.757324 19.2427)"
                                                        fill="currentColor" />
                                                    <rect x="7.72803" y="27.728" width="28" height="4"
                                                        rx="2" transform="rotate(-45 7.72803 27.728)"
                                                        fill="currentColor" />
                                                    <rect x="10.5366" y="16.3945" width="16" height="4"
                                                        rx="2" transform="rotate(45 10.5366 16.3945)"
                                                        fill="currentColor" />
                                                    <rect x="10.5562" y="-0.556152" width="28" height="4"
                                                        rx="2" transform="rotate(45 10.5562 -0.556152)"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                            <div class="logo-mini">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4"
                                                        rx="2" transform="rotate(-45 -0.757324 19.2427)"
                                                        fill="currentColor" />
                                                    <rect x="7.72803" y="27.728" width="28" height="4"
                                                        rx="2" transform="rotate(-45 7.72803 27.728)"
                                                        fill="currentColor" />
                                                    <rect x="10.5366" y="16.3945" width="16"
                                                        height="4" rx="2"
                                                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                                    <rect x="10.5562" y="-0.556152" width="28"
                                                        height="4" rx="2"
                                                        transform="rotate(45 10.5562 -0.556152)"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </div>
                                        <!--logo End-->

                                        <h4 class="logo-title ms-3">SAFE BKK</h4>
                                    </a>
                                    <h2 class="mb-2 text-center">สมัครสมาชิก</h2>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="full-name" class="form-label">ชื่อ</label>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">อีเมล</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="confirm-password"
                                                        class="form-label">ยืนยันรหัสผ่าน</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">
                                                สมัครสมาชิก
                                            </button>
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                เข้าสู่ระบบ
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg sign-bg-right">
                        <svg width="280" height="230" viewBox="0 0 421 359" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8" />
                                <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 149.47 319.328)" fill="#3A57E8" />
                                <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857"
                                    transform="rotate(45 203.936 99.543)" fill="#3A57E8" />
                                <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(45 204.316 -229.172)" fill="#3A57E8" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>

</body>

</html>
