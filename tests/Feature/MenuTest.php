<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Http\Resources\MenuResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function menu_can_load_all_its_menu_items_recursively_as_tree_structure()
    {
        list($menu, $menuItem, $childMenuItem) = $this->menuWithNestedMenuItems();
        $menuWithAllMenuItems = $menu->loadAllMenuItems();

        $this->assertCount(3, $menuWithAllMenuItems->parentMenuItems);

        foreach ($menuWithAllMenuItems->parentMenuItems as $menuItem) {
            $this->assertCount(2, $menuItem->childMenuItems);

            foreach ($menuItem->childMenuItems as $childMenuItem) {
                $this->assertCount(4, $childMenuItem->childMenuItems);
            }
        }
    }

    /** @test */
    public function menu_resource_converts_menu_with_nested_menu_items_to_nested_array()
    {
        list($menu, $menuItem, $childMenuItem) = $this->menuWithNestedMenuItems();
        $menuWithAllMenuItems = $menu->loadAllMenuItems();

        $menuResourceData = resolve(MenuResource::class)->toArray($menuWithAllMenuItems);

        $this->assertArrayHasKey('id', $menuResourceData);
        $this->assertArrayHasKey('status', $menuResourceData);
        $this->assertArrayHasKey('menuItems', $menuResourceData);
        $this->assertIsArray($menuResourceData['title']);
        $this->assertIsArray($menuResourceData['description']);
        $this->assertIsArray($menuResourceData['styles']);
        $this->assertIsArray($menuResourceData['menuItems']);
        $this->assertCount(3, $menuResourceData['menuItems']);
        $this->assertArrayHasKey('id', $menuResourceData['menuItems'][0]);
        $this->assertArrayHasKey('status', $menuResourceData['menuItems'][0]);
        $this->assertArrayHasKey('menuItems', $menuResourceData['menuItems'][0]);
        $this->assertIsArray($menuResourceData['menuItems'][0]['title']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['description']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['styles']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems']);
        $this->assertCount(2, $menuResourceData['menuItems'][0]['menuItems']);
        $this->assertArrayHasKey('id', $menuResourceData['menuItems'][0]['menuItems'][0]);
        $this->assertArrayHasKey('status', $menuResourceData['menuItems'][0]['menuItems'][0]);
        $this->assertArrayHasKey('menuItems', $menuResourceData['menuItems'][0]['menuItems'][0]);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['title']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['description']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['styles']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['menuItems']);
        $this->assertCount(4, $menuResourceData['menuItems'][0]['menuItems'][0]['menuItems']);
        $this->assertArrayHasKey('id', $menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]);
        $this->assertArrayHasKey('status', $menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]);
        $this->assertArrayHasKey('menuItems', $menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]['title']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]['description']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]['styles']);
        $this->assertIsArray($menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]['menuItems']);
        $this->assertCount(0, $menuResourceData['menuItems'][0]['menuItems'][0]['menuItems'][0]['menuItems']);
    }

    /**
     * Create a menu with nested menu items
     *
     * @return array
     */
    protected function menuWithNestedMenuItems(): array
    {
        $menu = factory(Menu::class)->create();

        $menuItems = factory(MenuItem::class, 3)->create();

        foreach ($menuItems as $menuItem) {
            $childMenuItems = factory(MenuItem::class, 2)->create([
                'menu_id' => $menu->id,
            ]);
            $menuItem->childMenuItems()->saveMany($childMenuItems);

            foreach ($childMenuItems as $childMenuItem) {
                $childChildMenuItems = factory(MenuItem::class, 4)->create([
                    'menu_id' => $menu->id,
                ]);
                $childMenuItem->childMenuItems()->saveMany($childChildMenuItems);
            }
        }
        $menu->menuItems()->saveMany($menuItems);

        return array($menu, $menuItem, $childMenuItem);
    }
}
