<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Admin users index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.users.index');
    }
}
