<?php

namespace App\Models;

class Menu extends BasicModel
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The menu may has many menu items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
