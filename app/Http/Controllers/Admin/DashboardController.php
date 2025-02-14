<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * __construct
     *
     * @return [type]
     *
     */
    public function __construct()
    {
    }

    /**
     * show page dashboard
     *
     * @return [type]
     *
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    /**
     * [Description for config]
     *
     * @return [type]
     *
     */
    public function config()
    {
        return [ 'js' => [
                // 'backend/js/plugins/flot/jquery.flot.js',
                // 'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                // 'backend/js/plugins/flot/jquery.flot.spline.js',
                // 'backend/js/plugins/flot/jquery.flot.resize.js',
                // 'backend/js/plugins/flot/jquery.flot.pie.js',
                // 'backend/js/plugins/flot/jquery.flot.symbol.js',
                // 'backend/js/plugins/flot/jquery.flot.time.js',
                // 'backend/js/plugins/peity/jquery.peity.min.js',
                // 'backend/js/demo/peity-demo.js',
                // 'backend/js/inspinia.js',
                // 'backend/js/plugins/pace/pace.min.js',
                // 'backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                // 'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                // 'backend/js/plugins/easypiechart/jquery.easypiechart.js',
                // 'backend/js/plugins/sparkline/jquery.sparkline.min.js',
                // 'backend/js/demo/sparkline-demo.js'
            ]
        ];
    }
}
