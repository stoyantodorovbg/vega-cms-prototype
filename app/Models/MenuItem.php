<?php

namespace App\Models;

class MenuItem extends BasicModel
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
     * The menu item belongs to a menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * The menu item may has a parent menu item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentMenuItem()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * The menu item may has manu child menu items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childMenuItems()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    /**
     * Load all child menu items recursivelly
     *
     * @param MenuItem $menuItem
     * @return void
     */
    public function loadAllChildItems(MenuItem $menuItem): void
    {
        $menuItem->load('childMenuItems');
        foreach ($this->childMenuItems as $childMenuItem) {
            $childMenuItem->load('childMenuItems');

            if($childMenuItem->childMenuItems->count()) {
                $childMenuItem->loadAllChildItems($childMenuItem);
            }
        }
    }
}
