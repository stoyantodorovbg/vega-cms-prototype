<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminIndexRequest;

class IndexController extends Controller
{
    /**
     * Return data for admin index pages
     *
     * @param AdminIndexRequest $request
     * @return mixed
     */
    public function data(AdminIndexRequest $request)
    {
        $modelName = "\\App\\Models\\" . $request->model;

        return $modelName::all();
    }
}
