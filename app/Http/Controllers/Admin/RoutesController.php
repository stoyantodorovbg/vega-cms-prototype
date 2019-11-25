<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRouteRequest;
use App\Models\Route;
use App\Services\Interfaces\RouteServiceInterface;

class RoutesController extends Controller
{
    /**
     * @var RouteServiceInterface
     */
    private $routeService;

    /**
     * RoutesController constructor.
     * @param RouteServiceInterface $routeService
     */
    public function __construct(RouteServiceInterface $routeService)
    {
        $this->routeService = $routeService;
    }

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
     * Admin routes show page
     *
     * @param Route $route
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Route $route)
    {
        return view('admin.routes.show', compact('route'));
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
        $validationData = $this->routeService->create($request->validated());

        if($validationData === true) {
            $route = Route::where('name', $request->name)->first();

            return redirect()->route('admin-routes.show', $route->getSlug())->with(compact('route'));
        }

        return redirect()->back()->with(['messageData' => $validationData]);
    }

//    /**
//     * Admin routes edit page
//     *
//     * @param Route $route
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function edit(Route $route)
//    {
//        return view('admin.routes.edit', compact('route'));
//    }
//
//    /**
//     * Admin routes update action
//     *
//     * @param Route $route
//     * @param AdminRouteRequest $request
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function update(Route $route, AdminRouteRequest $request)
//    {
//        $route->update($request->validated());
//
//        return redirect()->back()->with(compact('route'));
//    }
}
