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
    public function user_data_can_be_viewed_on_user_edit_page()
    {
        $this->authenticate(null, 'admins');

        $user = factory(User::class)->create([
                'name' => 'Test User'
            ]
        );

        $this->get(route('admin-users.edit', $user->id))
            ->assertSee('Test User');
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
    public function group_data_can_be_viewed_on_group_edit_page()
    {
        $this->authenticate(null, 'admins');

        $group = factory(Group::class)->create([
                'description' => 'Test description'
            ]
        );

        $this->get(route('admin-groups.edit', $group->id))
            ->assertSee('Test description');
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
    public function phrase_data_can_be_viewed_on_phrase_edit_page()
    {
        $this->authenticate(null, 'admins');

        $phrase = factory(Phrase::class)->create([
                'system_name' => 'test_system_name'
            ]
        );

        $this->get(route('admin-phrases.edit', $phrase->id))
            ->assertSee('test_system_name');
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

    /** @test */
    public function locale_data_can_be_viewed_on_locale_edit_page()
    {
        $this->authenticate(null, 'admins');

        $locale = factory(Locale::class)->create([
                'code' => 'fr'
            ]
        );

        $this->get(route('admin-locales.edit', $locale->id))
            ->assertSee('fr');
    }
}
