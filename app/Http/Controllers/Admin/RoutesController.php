<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRouteRequest;
use App\Models\Route;

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

    /**
     * Admin routes create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.routes.create');
    }

    /**
     * Admin routes store action
     *
     * @param AdminRouteRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AdminRouteRequest $request)
    {
        $route = Route::create($request->validated());

        return redirect()->route('admin-routes.edit', compact('route'));
    }

    /**
     * Admin routes edit page
     *
     * @param Route $route
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Route $route)
    {
        return view('admin.routes.edit');
    }

    /**
     * Admin routes update action
     *
     * @param Route $route
     * @param AdminRouteRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Route $route, AdminRouteRequest $request)
    {
        return redirect()->back();
    }
}
