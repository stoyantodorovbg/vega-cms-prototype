<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Group;
use App\Models\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_route_may_has_groups(): void
    {
        $route = factory(Route::class)->create();

        $groups = factory(Group::class, 5)->create();

        $route->groups()->saveMany($groups);

        $this->assertEquals(5, $route->groups->count());
        $this->assertInstanceOf(Group::class, $route->groups[0]);
    }

    /** @test */
    public function the_route_has_an_unique_url(): void
    {
        $route = factory(Route::class)->create();

        $this->expectException('Illuminate\Database\QueryException');

        factory(Route::class)->create([
            'url' => $route->url,
        ]);
    }

    /** @test */
    public function the_route_has_an_unique_action(): void
    {
        $route = factory(Route::class)->create();

        $this->expectException('Illuminate\Database\QueryException');

        factory(Route::class)->create([
            'action' => $route->action,
        ]);
    }

    /** @test */
    public function the_route_has_an_unique_name()
    {
        $route = factory(Route::class)->create();

        $this->expectException('Illuminate\Database\QueryException');

        factory(Route::class)->create([
            'name' => $route->name,
        ]);
    }
}
