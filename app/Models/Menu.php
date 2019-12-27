<?php

namespace App\Models;

class Menu extends BasicModel
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
        'description' => 'array',
        'styles' => 'array'
    ];

    /**
     * The menu may has many menu items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    /**
     * The menu items which have parent lavel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parentMenuItems()
    {
        return $this->hasMany(MenuItem::class)->whereNull('parent_id');
    }

    /**
     * Load all menu items
     *
     * @return void
     */
    public function loadAllMenuItems()
    {
        $this->load('parentMenuItems');

        foreach ($this->parentMenuItems as $menuItem) {
            $menuItem->loadAllChildItems($menuItem);
        }

        return $this;
    }
}
