<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Container;
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
}
