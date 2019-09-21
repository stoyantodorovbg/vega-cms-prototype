<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    public function index()
    {
        return view('admin.groups.index');
    }
}
