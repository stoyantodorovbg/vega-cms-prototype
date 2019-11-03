<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use App\Models\Route;
use App\Models\Locale;
use App\Models\Phrase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminEditPagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_edit_page_can_be_visited_from_admins()
    {
        $user = factory(User::class)->create();
        $this->authenticate(null, 'admins');

        $this->get(route('admin-users.edit', $user->getSlug()))
            ->assertStatus(200);
    }

    /** @test */
    public function group_edit_page_can_be_visited_from_admins()
    {
        $group = factory(Group::class)->create();
        $this->authenticate(null, 'admins');

        $this->get(route('admin-groups.edit', $group->getSlug()))
            ->assertStatus(200);
    }

    /** @test */
    public function phrase_edit_page_can_be_visited_from_admins()
    {
        $phrase = factory(Phrase::class)->create();
        $this->authenticate(null, 'admins');

        $this->get(route('admin-phrases.edit', $phrase->getSlug()))
            ->assertStatus(200);
    }

    /** @test */
    public function route_edit_page_can_be_visited_from_admins()
    {
        $route = factory(Route::class)->create();
        $this->authenticate(null, 'admins');

        $this->get(route('admin-routes.edit', $route->getSlug()))
            ->assertStatus(200);
    }

    /** @test */
    public function locale_edit_page_can_be_visited_from_admins()
    {
        $locale = factory(Locale::class)->create();
        $this->authenticate(null, 'admins');

        $this->get(route('admin-locales.edit', $locale->getSlug()))
            ->assertStatus(200);
    }
}
