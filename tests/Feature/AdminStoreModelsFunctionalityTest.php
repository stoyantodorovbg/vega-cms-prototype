<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminStoreModelsFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function group_can_be_stored_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-groups.store'), [
            'title' => 'testTitle',
            'description' => 'testDescription',
            'status' => 1
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('groups', [
            'title' => 'testTitle',
            'description' => 'testDescription',
            'status' => 1
        ]);
    }

    /** @test */
    public function locale_can_be_stored_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-locales.store'), [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 1,
            'add_to_url' => 1
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('locales', [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 1,
            'add_to_url' => 1
        ]);
    }

    /** @test */
    public function phrase_can_be_stored_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-phrases.store'), [
            'system_name' => 'test_phrase',
            'text' => ['en' => 'test phrase']
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('phrases', [
            'system_name' => 'test_phrase',
            'text' => '{"en":"test phrase"}'
        ]);
    }

    /** @test */
    public function route_can_be_stored_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-routes.store'), [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test',
            'route_type' => 'web'
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test',
            'route_type' => 'web'
        ]);
    }

    /** @test */
    public function user_can_be_stored_through_admin_form()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-users.store'), [
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => 'test-password',
            'password_confirmation' => 'test-password'
        ])
            ->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@email.com',
        ]);

        $this->assertTrue(Hash::check('test-password', User::where('email', 'test@email.com')->first()->password));
    }
}
