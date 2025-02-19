<footer class="main-footer">
    <strong>Sinh viên thực hiện:<a href="javascript:void(0)"> TuNV</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Đà Nẵng</b> <span class="date_time_system">00/00/0000</span>
    </div>
</footer>
<!-- Script-->
<script type="module">
    $(function () {
        $('.date_time_system').text(moment().format('DD/MM/YYYY'));
    });
</script>
