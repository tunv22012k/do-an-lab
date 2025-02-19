<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot password</title>

    <link href="extension/css/bootstrap.min.css" rel="stylesheet">
    <link href="extension/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="extension/css/animate.css" rel="stylesheet">
    <link href="extension/css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="extension/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>

<body class="gray-bg">
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Quên mật khẩu</h2>
                    <p>
                        Nhập địa chỉ email của bạn, mật khẩu sẽ được đặt lại và gửi tới email của bạn.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="post" action="{{ route('submit_forgot_password') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Địa chỉ Email" required="">
                                </div>
                                <button type="submit" class="btn btn-primary block full-width m-b">Đặt lại mật khẩu</button>
                                <a href="{{ route('login') }}">
                                    <small>Đăng nhập</small>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Công ty TNHH MTV TuNV
            </div>
            <div class="col-md-6 text-right">
               <small>© 2024-2025</small>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('extension/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('extension/js/plugins/toastr/toastr.min.js') }}"></script>
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
</body>
</html>
