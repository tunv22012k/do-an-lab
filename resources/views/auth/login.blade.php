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
        </style>
    </head>

    <body class="gray-bg">
        <div class="loginColumns animated fadeInDown">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-bold">Welcome to IN+</h2>
                    <p>
                        Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                    </p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                    <p>
                        When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <p>
                        <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="ibox-content">
                        <form method="post" class="m-t" role="form" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder="Email"
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
                                    placeholder="Password"

                                >
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="error-messenger">* {{
                                $errors->first('password') }}</span>
                            @endif
                            <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
                            <a href="#">
                                <small>Forgot password?</small>
                            </a>
                            <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                        </form>
                        <p class="m-t">
                            <small>newbie code we app framework base on Bootstrap 3 &copy; 2025</small>
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    Copyright Example Company
                </div>
                <div class="col-md-6 text-right">
                <small>© 2024-2025</small>
                </div>
            </div>
        </div>

        <script type="module">
            $(function() {
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
