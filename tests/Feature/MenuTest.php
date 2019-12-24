<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function menu_can_load_all_his_menu_items_recursively_as_tree_structure()
    {
        $menu = factory(Menu::class)->create();

        $menuItems = factory(MenuItem::class, 3)->create();

        foreach($menuItems as $menuItem) {
            $childMenuItems = factory(MenuItem::class, 2)->create([
                'menu_id' => $menu->id,
            ]);
            $menuItem->childMenuItems()->saveMany($childMenuItems);

            foreach($childMenuItems as $childMenuItem) {
                $childChildMenuItems = factory(MenuItem::class, 4)->create([
                    'menu_id' => $menu->id,
                ]);
                $childMenuItem->childMenuItems()->saveMany($childChildMenuItems);
            }
        }
        $menu->menuItems()->saveMany($menuItems);

        $menuWithAllMenuItems = $menu->loadAllMenuItems();

        $this->assertCount(3, $menuWithAllMenuItems->parentMenuItems);

        foreach ($menuWithAllMenuItems->parentMenuItems as $menuItem) {
            $this->assertCount(2, $menuItem->childMenuItems);

            foreach ($menuItem->childMenuItems as $childMenuItem) {
                $this->assertCount(4, $childMenuItem->childMenuItems);
            }
        }
    }
}
