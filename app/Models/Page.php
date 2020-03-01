<?php

namespace App\Models;

class Page extends BasicModel
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'meta_gats' => 'array',
        'styles' => 'array',
    ];

    /**
     * The page may has many containers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function containers()
    {
        return $this->belongsToMany(Container::class, 'page_container');
    }
}
