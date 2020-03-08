<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Container;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_page_may_has_many_containers()
    {
        $page = factory(Page::class)->create();

        $containersIds = factory(Container::class, 10)->create()->pluck('id')->toArray();

        $page->containers()->attach($containersIds);

        $this->assertCount(10, $page->containers);
    }

    public function page_can_load_all_assigned_containers_with_theirs_nested_containers()
    {
        $page = factory(Page::class)->create();

        $containers = factory(Container::class, 3)->create();

        $childContainers = factory(Container::class, 10)->create();

        $nestedContainers = factory(Container::class, 5)->create();

        $page->containers()->attach($containers->pluck('id')->toArray());

        $container->childContainers()->attach($childContainers->pluck('id')->toArray());

        $childContainers->each(function ($container) use($nestedContainers) {
            $container->childContainers()->attach($nestedContainers->pluck('id')->toArray());
        });

        $container->loadAllChildContainers();

        $queriesCount = 0;
        DB::listen(function ($query) use (&$queriesCount) {
            $queriesCount++;
        });

        $this->assertCount(5, $page->containers);

        foreach($page->containers as $container) {
            foreach ($container->childContainers as $childContainer) {
                $this->assertCount(10, $childContainer->childContainers);
                foreach($childContainer->childContainers() as $childNestedcontainer) {
                    $this->assertCount(5, $childNestedcontainer->childContainers);
                }
            }
        }


        $this->assertEquals(0 , $queriesCount);
    }
}
