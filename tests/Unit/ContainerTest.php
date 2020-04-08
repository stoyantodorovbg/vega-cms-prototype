<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Container;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContainerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_container_may_has_many_pages()
    {
        $container = factory(Container::class)->create();

        $pagesIds = factory(Page::class, 10)->create()->pluck('id')->toArray();

        $container->pages()->attach($pagesIds);

        $this->assertCount(10, $container->pages);
    }

    /** @test */
    public function the_container_may_has_many_parent_containers()
    {
        $container = factory(Container::class)->create();

        $parentContainersIds = factory(Container::class, 10)->create()->pluck('id')->toArray();

        $container->parentContainers()->attach($parentContainersIds);

        $this->assertCount(10, $container->parentContainers);
    }

    /** @test */
    public function the_container_may_has_many_child_containers()
    {
        $container = factory(Container::class)->create();

        $childContainersIds = factory(Container::class, 10)->create()->pluck('id')->toArray();

        $container->childContainers()->attach($childContainersIds);

        $this->assertCount(10, $container->childContainers);
    }

    /** @test */
    public function the_container_can_load_all_nested_child_containers()
    {
        $container = factory(Container::class)->create();

        $childContainers = factory(Container::class, 10)->create();

        $nestedContainers = factory(Container::class, 5)->create();

        $container->childContainers()->attach($childContainers->pluck('id')->toArray());

        $childContainers->each(function ($container) use($nestedContainers) {
            $container->childContainers()->attach($nestedContainers->pluck('id')->toArray());
        });

        $container->loadAllChildContainers();

        $queriesCount = 0;
        DB::listen(function ($query) use (&$queriesCount) {
            $queriesCount++;
        });

        $this->assertCount(10, $container->childContainers);

        foreach ($container->childContainers as $childContainer) {
            $this->assertCount(5, $childContainer->childContainers);
        }

        $this->assertEquals(0 , $queriesCount);
    }
}
