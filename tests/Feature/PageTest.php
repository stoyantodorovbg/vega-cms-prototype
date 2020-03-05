<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Page;
use App\Models\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function if_there_is_no_active_page_for_the_requested_url_the_controller_returns_404()
    {
        $this->get('/unexisting-page')->assertStatus(404);
    }

    /** @test */
    public function an_active_page_url_can_be_accessed_through_wildcard_routing()
    {
        factory(Page::class)->create(['url' => '/existing-page-url']);

        $this->get('/' . app()->getLocale() . '/existing-page-url')->assertStatus(200);
    }

    /** @test */
    public function page_with_the_same_url_as_existing_route_can_not_be_created()
    {
        factory(Route::class)->create(['url' => '/test']);

        $this->expectException(ValidationException::class);

        factory(Page::class)->create(['url' => '/test']);

        $this->assertDatabaseMissing('pages', ['url' => '/test']);
    }
}
