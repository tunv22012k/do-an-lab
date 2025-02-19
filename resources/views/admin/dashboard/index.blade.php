@extends('layouts.admin')
@section('title')
    dashboard
@stop
@section('template_title')
    {{ __('Trang tổng quan') }}
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>1</h3>

                    <p>Quản Trị Viên</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>1</h3>

                    <p>Người Dùng</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
@stop

@section('page_scripts')
    <script type="module">
        $(function() {
        });
    </script>
@stop
