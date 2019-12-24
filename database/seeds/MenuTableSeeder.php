<?php

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = factory(Menu::class)->create();

        $parentMenuItems = factory(MenuItem::class, 3)->create([
            'menu_id' => $menu->id,
        ]);

        foreach ($parentMenuItems as $parentMenuItem) {
            $childMenuItems = factory(MenuItem::class, 3)->create([
                'menu_id' => $menu->id,
                'parent_id' => $parentMenuItem->id,
            ]);

            foreach ($childMenuItems as $childMenuItem) {
                factory(MenuItem::class, 3)->create([
                    'menu_id' => $menu->id,
                    'parent_id' => $childMenuItem->id,
                ]);
            }
        }
    }
}
