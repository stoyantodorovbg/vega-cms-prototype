<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminIndexPagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_index_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-users.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function group_index_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-groups.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function phrase_index_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-phrases.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function route_index_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-routes.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function locale_index_page_can_be_visited_from_admins()
    {
        $this->authenticate(null, 'admins');

        $this->get(route('admin-locales.index'))
            ->assertStatus(200);
    }
}
