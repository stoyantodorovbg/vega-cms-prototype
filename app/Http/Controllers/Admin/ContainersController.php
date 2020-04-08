<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;

class ContainersController extends Controller
{
    /**
     * Admin dashboard page
     *
     * @param Page $page
     * @param int $container
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Page $page, int $container)
    {
        $defaultFilters = [
            'pages.id' => [
                'types' => [
                    'whereHasMany' => [
                        'value' => [
                            'value' => $page->id,
                            'relationMethod' => 'pages',
                        ],
                    ]
                ]
            ],
        ];

        return view('admin.containers.index')->with([
            'defaultFilters' => json_encode($defaultFilters),
            'pageSlug' => $page->getSlug()
        ]);
    }
}
