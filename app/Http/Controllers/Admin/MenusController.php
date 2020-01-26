<?php

namespace App\Http\Controllers\Admin;

use App\Models\DefaultJsonStructure;
use App\Models\Menu;
use App\DataMappers\MenuDataMapper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminMenuRequest;
use App\Repositories\Interfaces\DefaultJsonStructureRepositoryInterface;

class MenusController extends Controller
{
    /**
     * Admin menus menus page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.menus.index');
    }

    /**
     * Admin menus show page
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Admin menus create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $defaultJsonStructureRepository = resolve(DefaultJsonStructureRepositoryInterface::class);
        $defaultJsonFieldsData = $defaultJsonStructureRepository->getJsonStructureFields(Menu::class)
            ->pluck('structure', 'field')->toArray();

        return view('admin.menus.create', compact('defaultJsonFieldsData'));
    }

    /**
     * Admin menus store action
     *
     * @param AdminMenuRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AdminMenuRequest $request)
    {
        $mappedData = resolve(MenuDataMapper::class)->mapData($request->validated());

        $menu = Menu::create($mappedData);

        return redirect()->route('admin-menus.show', $menu->getSlug())->with(compact('menu'));
    }

    /**
     * Admin menus edit page
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        $menu->loadAllMenuItems();

        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Admin menus update action
     *
     * @param Menu $menu
     * @param AdminMenuRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Menu $menu, AdminMenuRequest $request)
    {
        $mappedData = resolve(MenuDataMapper::class)->mapData($request->validated());

        $menu->update($mappedData);

        return redirect()->back()->with(compact('menu'));
    }
}
