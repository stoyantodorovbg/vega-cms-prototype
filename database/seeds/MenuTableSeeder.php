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
        // Right side admin menu
        $menu = factory(Menu::class)->create([
            'title' => json_encode([
                'text' => 'Admin side nav',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => 'Right side navigation for the administration.',
                'status' => 0,
                'classes' => 'admin-side-nav d-inline-flex p-3 pl-4 col-2',
                'styles' => []
            ]),
            'status' => 1,
            'classes' => 'admin-side-nav p-3 pl-4 col-2',
            'styles' => json_encode([]),
        ]);

        // Right side admin menu - menu items
        $menuItem = factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/dashboard',
            'title' => json_encode([
                'text' => 'dashboard',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/users',
            'title' => json_encode([
                'text' => 'users',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/groups',
            'title' => json_encode([
                'text' => 'user groups',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/dashboard',
            'title' => json_encode([
                'text' => 'dashboard',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/phrases',
            'title' => json_encode([
                'text' => 'phrases',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/locales',
            'title' => json_encode([
                'text' => 'locales',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);

        factory(MenuItem::class)->create([
            'menu_id' => $menu->id,
            'parent_id' => null,
            'status' => 1,
            'url' => '/routes',
            'title' => json_encode([
                'text' => 'routes',
                'status' => 1,
                'classes' => 'text-dark',
                'styles' => []
            ]),
            'description' => json_encode([
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]),
            'classes' => 'mb-2 mt-2 text-uppercase',
            'styles' => json_encode([]),
        ]);
    }
}
