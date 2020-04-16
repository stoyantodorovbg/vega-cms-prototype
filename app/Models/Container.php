<?php

namespace App\Models;

class Container extends BasicModel
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'title' => 'array',
        'summary' => 'array',
        'body' => 'array',
        'styles' => 'array',
    ];

    /**
     * The container may be attached to many pages
     *
     * @return mixed
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_container');
    }

    /**
     * The container may be attached to many containers
     *
     * @return mixed
     */
    public function parentContainers()
    {
        return $this->belongsToMany(
            Container::class,
            'parent_container_child_container',
            'child_container_id',
            'parent_container_id',
        );
    }

    /**
     * The container may has many child containers
     *
     * @return mixed
     */
    public function childContainers()
    {
        return $this->belongsToMany(
            Container::class,
            'parent_container_child_container',
            'parent_container_id',
            'child_container_id',
        );
    }

    /**
     * Load all nested child containers for this container
     *
     * @return void
     */
    public function loadAllChildContainers(): void
    {
        $containers = $this->childContainers;

        $containers->each(function ($container) {
            $this->loadChildContainers($container);
        });
    }

    /**
     * Recursivelly load child containers fo a givven container
     *
     * @param Container $container
     * @return void
     */
    public function loadChildContainers(Container $container): void
    {
        $container->load('childContainers');
        if($container->childContainers->count()) {
            $container->childContainers->each(function ($container) {
                $this->loadChildContainers($container);
            });
        }
    }
}
