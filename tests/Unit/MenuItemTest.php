<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function menuItemHasAMenu()
    {
        $menuItem = factory(MenuItem::class)->create();

        $this->assertInstanceOf(Menu::class, $menuItem->menu);
    }

    /** @test */
    public function menuItemMayHasParentMenuItems()
    {
        $menuItem = factory(MenuItem::class)->create();
        $childMenuItem = factory(MenuItem::class)->create();

        $childMenuItem->parentMenuItem()->associate($menuItem);

        $this->assertEquals($childMenuItem->parentMenuItem->id, $menuItem->id);
    }

    /** @test */
    public function menuItemMayHasManyChildMenuItems()
    {
        $menuItem = factory(MenuItem::class)->create();
        $childMenuItems = factory(MenuItem::class, 10)->create();

        $menuItem->childMenuItems()->saveMany($childMenuItems);
        $this->assertCount(10, $menuItem->childMenuItems);
    }
}
