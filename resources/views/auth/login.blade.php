<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>

        <link href="extension/css/bootstrap.min.css" rel="stylesheet">
        <link href="extension/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="extension/css/animate.css" rel="stylesheet">
        <link href="extension/css/style.css" rel="stylesheet">
        <link href="extension/css/customize.css" rel="stylesheet">

        <!-- Toastr style -->
        {{-- <link href="extension/css/plugins/toastr/toastr.min.css" rel="stylesheet"> --}}

        @vite(['resources/js/app.js'])

        <style>
            .field-icon {
                float: right;
                margin-left: -25px;
                margin-top: -25px;
                position: relative;
                z-index: 2;
                margin-right: 5px;
            }
            .hr_login {
                margin-top: 15px;
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body class="gray-bg">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="ibox-content">
                        ĐĂNG NHẬP TRANG QUẢN LÝ
                        <form method="post" class="m-t" role="form" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder="Địa chỉ email"
                                    value="{{ old('email') }}"
                                >
                                @if ($errors->has('email'))
                                    <span class="error-messenger">* {{
                                    $errors->first('email') }}</span>
                                @endif

                            </div>
                            <div class="form-group">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control form-password"
                                    placeholder="Mật khẩu"

                                >
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="error-messenger">* {{
                                $errors->first('password') }}</span>
                            @endif
                            <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
                            <a href="{{ route('forgot_password') }}" style="margin-top: 5px">
                                <small>Quên mật khẩu?</small>
                            </a>
                        </form>
                        <p class="m-t">
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <hr class="hr_login" />
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    Công ty TNHH MTV TuNV
                </div>
                <div class="col-md-4 text-right">
                    <small>© 2024-2025</small>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <!-- Mainly scripts -->
        {{-- <script src="{{ asset('extension/js/jquery-3.1.1.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('extension/js/plugins/toastr/toastr.min.js') }}"></script> --}}
        <script type="module">
            $(function() {
                // show and hide text password
                $(".toggle-password").click(function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($('.form-password'));
                    if (input.attr("type") == "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
            });
        </script>
    </body>
</html>
