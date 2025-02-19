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
    <link href="{{ asset('extension/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('extension/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('extension/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('extension/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('extension/css/customize.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('extension/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    @yield('page_styles')

    <!-- Script-->
    <script src="{{ asset('extension/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('extension/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/library/library.js') }}"></script> --}}
    <script src="{{ asset('extension/js/jquery-3.1.1.min.js') }}"></script>
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.js') }}"></script> --}}
    <script src="{{ asset('extension/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.spline.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.resize.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.pie.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.symbol.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/flot/jquery.flot.time.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/peity/jquery.peity.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/demo/peity-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/inspinia.js') }}"></script> --}}
    <script src="{{ asset('extension/js/plugins/pace/pace.min.js') }}"></script>
    {{-- <script src="{{ asset('extension/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('extension/js/demo/sparkline-demo.js') }}"></script> --}}

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
<body>
    <div id="wrapper">
        <!-- sidebar -->
        @include('layouts.partial.sidebar')
        <!-- /sidebar -->

        <div id="page-wrapper" class="gray-bg">
            @include('layouts.partial..nav')
            @yield('content')
            @include('layouts.partial.footer')
        </div>
    </div>
    @stack('scripts')
    @yield('page_scripts')
</body>
</html>
