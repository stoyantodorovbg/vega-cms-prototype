<?php

use App\Models\Group;
use App\Models\Route;
use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = factory(Route::class, 5)->create();

        $groups = Group::all();

        foreach ($groups as $group) {
            $group->routes()->saveMany($routes);
        }
    }
}
