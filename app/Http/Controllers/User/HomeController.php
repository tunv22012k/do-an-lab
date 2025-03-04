<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        return view('user.index');
    }
}
