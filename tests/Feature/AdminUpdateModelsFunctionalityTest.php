<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use App\Models\Route;
use App\Models\Locale;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUpdateModelsFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function group_can_be_updated_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $group = factory(Group::class)->create([
            'title' => 'testTitle',
            'description' => 'testDescription',
            'status' => 1
        ]);

        $this->patch(route('admin-groups.update', $group->getSlug()), [
            'title' => 'edited',
            'description' => 'edited',
            'status' => 0
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('groups', [
            'title' => 'edited',
            'description' => 'edited',
            'status' => 0
        ]);
    }

    /** @test */
    public function locale_can_be_updated_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $locale = factory(Locale::class)->create([
            'language' => 'Bulgaria',
            'code' => 'b',
            'status' => 1,
            'add_to_url' => 1
        ]);

        $this->patch(route('admin-locales.update', $locale->getSlug()), [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 0,
            'add_to_url' => 0
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('locales', [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 0,
            'add_to_url' => 0
        ]);
    }

    /** @test */
    public function route_can_be_updated_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $locale = factory(Route::class)->create([
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test',
            'route_type' => 'web'
        ]);

        $this->patch(route('admin-routes.update', $locale->getSlug()), [
            'url' => '/test-edited',
            'method' => 'patch',
            'action' => 'TestController@edited',
            'name' => 'edited',
            'route_type' => 'web'
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('routes', [
            'url' => '/test-edited',
            'method' => 'patch',
            'action' => 'TestController@edited',
            'name' => 'edited',
            'route_type' => 'web'
        ]);
    }

    /** @test */
    public function user_can_be_updated_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $locale = factory(User::class)->create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => 'test-password',
        ]);

        $this->patch(route('admin-users.update', $locale->getSlug()), [
            'name' => 'edited',
            'email' => 'edited@email.com',
            'password' => 'edited',
            'password_confirmation' => 'edited'
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'edited',
            'email' => 'edited@email.com',
        ]);

        $this->assertTrue(Hash::check('edited', User::where('email', 'edited@email.com')->first()->password));
    }

    /** @test */
    public function locale_form_validation()
    {
        $this->authenticate(null, 'admins');

        $locale = factory(Locale::class)->create([
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 1,
            'add_to_url' => 1
        ]);

        $this->patch(route('admin-locales.update', $locale->getSlug()), [
            'language' => '',
            'code' => '',
            'status' => 3,
            'add_to_url' => 3
        ])->assertSessionHasErrors([
            'language' => 'The language field is required.',
            'code' => 'The code field is required.',
            'status' => 'The status must be between 0 and 1.',
            'add_to_url' => 'The add to url must be between 0 and 1.'
        ]);

        $this->patch(route('admin-locales.update', $locale->getSlug()), [
            'language' => 'Bulgariannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn',
            'code' => 'bgg',
            'status' => 11,
            'add_to_url' => 11
        ])->assertSessionHasErrors([
            'language' => 'The language may not be greater than 50 characters.',
            'code' => 'The code may not be greater than 2 characters.',
            'status' => 'The status must be between 0 and 1.',
            'add_to_url' => 'The add to url must be between 0 and 1.'
        ]);

        $this->patch(route('admin-locales.update', $locale->getSlug()), [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 0,
            'add_to_url' => 0
        ])->assertSessionHasNoErrors();
    }
}
