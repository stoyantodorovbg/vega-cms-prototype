<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGroupRequest;

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

    /**
     * Admin groups show page
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Group $group)
    {
        return view('admin.groups.show', compact('group'));
    }

    /**
     * Admin groups create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Admin groups store action
     *
     * @param AdminGroupRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AdminGroupRequest $request)
    {
        $group = Group::create($request->all());

        return redirect()->route('admin-groups.show', $group->getSlug())->with(compact('group'));
    }

    /**
     * Admin groups edit page
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Admin groups update action
     *
     * @param Group $group
     * @param AdminGroupRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Group $group, AdminGroupRequest $request)
    {
        $group->update($request->all());

        return redirect()->back()->with(compact($group));
    }
}
