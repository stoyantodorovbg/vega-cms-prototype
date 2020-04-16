<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardsController extends Controller
{
    /**
     * Admin dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboards.index');
    }
}
