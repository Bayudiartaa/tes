
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/izitoast/dist/css/iziToast.min.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/third-party/bootstrap/css/bootstrap.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/components.css')}} ">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
        <!-- NAVBAR -->
        @include('layouts.navbar')
        <!-- END NAVBAR -->

        <!-- SIDEBAR -->
        @include('layouts.sidebar')
        <!-- ENDSIDEBAR -->

        <!-- START CONTENT -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('title')</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                    </div>
                </div>
                @yield('content')
            </section>
        </div>
        <!-- END CONTENT -->

        <!-- FOOTER -->
        @include('layouts.footer')
        <!-- ENDFOOTER -->

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/third-party/jquery.js')}}"></script>
    <script src="{{asset('assets/third-party/popper.js')}}"></script>
    <script src="{{asset('assets/third-party/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/third-party/nicescroll.js')}}"></script>
    <script src="{{asset('assets/third-party/moment.js')}}"></script>
    <script src="{{asset('assets/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <script src="{{ asset('TableCheckAll.js') }}"></script>
    <script src="{{ asset('assets/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template JS File -->
    <script src="{{asset('assets/assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    <script>

    </script>
        @yield('script')
</body>
</html>
