<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCreatePagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_create_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-users.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function group_create_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-groups.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function phrase_create_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-phrases.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function route_create_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-routes.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function locale_create_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-locales.create'))
            ->assertStatus(200);
    }
}
