<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    /**
     * Admin groups index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.groups.index');
    }
}
