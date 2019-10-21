<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PhrasesController extends Controller
{
    /**
     * Admin phrases index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.phrases.index');
    }
}
