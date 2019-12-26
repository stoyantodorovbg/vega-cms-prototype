<?php

namespace App\Http\Resources;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class MenuResource implements ResourceInterface
{
    /**
     * Return an array of the resource data
     *
     * @param Model $menu
     * @return array
     */
    public function toArray(Model $menu): array
    {
        $menuData = [
            'id' => $menu->id,
            'status' => $menu->status,
            'title' => json_decode($menu->title, true),
            'description' => json_decode($menu->description, true),
            'classes' => $menu->classes,
            'styles' => json_decode($menu->styles, true),
        ];

        if($menu->parentMenuItems->count()) {
            $menuData['menuItems'] = $this->addMenuItemsData($menu->parentMenuItems);
        }

        return $menuData;
    }

    /**
     * Add menu items data
     *
     * @param array $menuData
     * @return array
     */
    protected function addMenuItemsData(Collection $menuItems): array
    {
        $menuData = [];

        foreach ($menuItems as $menuItem) {
            $menuData[] = [
                'id' => $menuItem->id,
                'status' => $menuItem->status,
                'url' => $menuItem->url,
                'title' => json_decode($menuItem->title, true),
                'description' => json_decode($menuItem->description, true),
                'classes' => $menuItem->classes,
                'styles' => json_decode($menuItem->styles, true),
                'menuItems' =>  $menuItem->childMenuItems->count() ?
                    $this->addMenuItemsData($menuItem->childMenuItems) : []
            ];
        }

        return $menuData;
    }
}
