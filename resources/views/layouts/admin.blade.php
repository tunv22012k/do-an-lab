<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="refresh" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>@yield('title')</title>

    <!-- Styles -->
    @vite(['resources/css/app.css'])

    @yield('page_styles')

    @vite(['resources/js/app.js'])
    <!-- toastr-->
    <script src="{{ asset('extension/js/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Script-->
    <script type="module">
        $(function () {
            var toastrPopup = "{{ uniqid() }}";
            if(!sessionStorage.getItem('shown-' + toastrPopup)) {
                @if ($message = Session::get('success'))
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success("{{ $message }}");
                    sessionStorage.setItem('shown-' + toastrPopup, '1');
                @endif

                @if ($message = Session::get('error'))
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error("{{ $message }}");
                    sessionStorage.setItem('shown-' + toastrPopup, '1');
                @endif
            }
        });
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/loading.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        @include('layouts.partial.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                @if (trim($__env->yieldContent('template_title')))
                                    @yield('template_title')
                                @endif
                            </h1>
                        </div><!-- /.col -->
                        {{-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="/admin">Trang chính</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    @if (trim($__env->yieldContent('template_title')))
                                        @yield('template_title')
                                    @endif
                                </li>
                            </ol>
                        </div><!-- /.col --> --}}
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.partial.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @yield('page_scripts')
</body>
</html>
