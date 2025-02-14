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
}
