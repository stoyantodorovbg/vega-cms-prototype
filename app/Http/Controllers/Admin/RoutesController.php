<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RoutesController extends Controller
{
    /**
     * Admin routes index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.routes.index');
    }
}
