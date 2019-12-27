<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_menu_may_has_many_menu_items()
    {
        $menu = factory(Menu::class)->create();
        $menuItems = factory(MenuItem::class, 10)->create();

        $menu->menuItems()->saveMany($menuItems);

        $this->assertCount(10, $menu->menuItems);
    }

    /** @test */
    public function the_manu_has_parent_menu_items()
    {
        $menu = factory(Menu::class)->create();

        $menuItems = factory(MenuItem::class, 3)->create();

        foreach($menuItems as $menuItem) {
            $childMenuItems = factory(MenuItem::class, 2)->create([
                'menu_id' => $menu->id,
            ]);
            $menuItem->childMenuItems()->saveMany($childMenuItems);
        }

        $menu->menuItems()->saveMany($menuItems);

        $this->assertCount(3, $menu->parentMenuItems);

        foreach ($menuItems as $menuItem) {
            $this->assertNull($menuItem->parentMenuItem);
        }
    }
}
