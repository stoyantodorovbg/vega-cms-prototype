<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class LocalesController extends Controller
{
    /**
     * Admin phrases locales page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.locales.index');
    }
}
