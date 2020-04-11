<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminContainerIndexRequest;
use App\Models\Page;
use App\Models\Container;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\DataMappers\DataMapperInterface;
use App\Http\Requests\Admin\AdminContainerRequest;
use App\Repositories\Interfaces\DefaultJsonStructureRepositoryInterface;

class ContainersController extends Controller
{
    /**
     * Admin dashboard page
     *
     * @param AdminContainerIndexRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminContainerIndexRequest $request)
    {
        $defaultFilters = [];

        if($page = Page::find($request->page)) {
            $defaultFilters['pages.id'] = [
                'types' => [
                    'whereHasMany' => [
                        'value' => [
                            'value' => $page->id,
                            'relationMethod' => 'pages',
                        ],
                    ]
                ]
            ];
        }

        if($container = Container::find($request->container)) {
            $defaultFilters['parent_container_child_container.parent_container_id'] = [
                'types' => [
                    'whereHasMany' => [
                        'value' => [
                            'value' => $container->id,
                            'relationMethod' => 'parentContainers',
                        ],
                    ]
                ]
            ];
        }

        return view('admin.containers.index')->with([
            'defaultFilters' => json_encode($defaultFilters),
            'pageSlug' => $page ? $page->getSlug() : null,
        ]);
    }

    /**
     * Admin containers show container
     *
     * @param Container $container
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Container $container)
    {

        return view('admin.containers.show', compact('container'));
    }

    /**
     * Admin containers create container
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(DefaultJsonStructureRepositoryInterface $defaultJsonStructureRepository)
    {
        $defaultJsonFieldsData = $defaultJsonStructureRepository->getJsonStructureFields(Container::class)
            ->pluck('structure', 'field')->toArray();

        return view('admin.containers.create', compact('defaultJsonFieldsData'));
    }

    /**
     * Admin containers store action
     *
     * @param AdminContainerRequest $request
     * @param DataMapperInterface $dataMapper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminContainerRequest $request)
    {
        $mappedData = $this->dataMapper->mapData($request->validated());

        $container = Container::create($mappedData);

        return redirect()->route('admin-containers.show', $container->getSlug())->with(compact('container'));
    }

    /**
     * Admin containers edit container
     *
     * @param Container $container
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Container $container)
    {
        $container->getData();

        return view('admin.containers.edit', compact('container'));
    }

    /**
     * Admin containers update action
     *
     * @param Container $container
     * @param AdminContainerRequest $request
     * @param DataMapperInterface $dataMapper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Container $container, AdminContainerRequest $request)
    {
        $mappedData = $this->dataMapper->mapData($request->validated());

        $container->update($mappedData);

        return redirect()->back()->with(compact('container'));
    }
}
