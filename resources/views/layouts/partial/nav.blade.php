<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Xem trang chính</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Hiển thị toàn màn hình">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="logout()" role="button" title="Đăng xuất">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </li>
        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
<script>
    function logout() {
        event.preventDefault();
        if(confirm('Bạn có muốn đăng xuất không?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>
