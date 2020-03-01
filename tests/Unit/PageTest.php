<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Container;
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
}
