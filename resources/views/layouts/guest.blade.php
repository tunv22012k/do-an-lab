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
<body>
    @yield('content')
    @stack('scripts')
    @yield('page_scripts')
</body>
</html>
