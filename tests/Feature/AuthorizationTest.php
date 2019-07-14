<?php

namespace Tests\Feature;

use App\Models\Group;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_requests_from_unauthorized_for_the_route_group_users_are_redirected_to_welcome_page(): void
    {
        $this->authenticate();

        $this->get(route('admin-dashboards.index'))
            ->assertStatus(302)
            ->assertRedirect(route('welcome'));
    }

    /** @test */
    public function the_assigned_to_group_user_can_visit_a_route_that_requires_authorization_for_the_same_group(): void
    {
        $adminGroup = factory(Group::class)->create([
            'title' => 'admins'
        ]);
        $user = factory(User::class)->create();
        $user->groups()->attach([$adminGroup->id]);

        $this->authenticate($user);

        $this->get(route('admin-dashboards.index'))
            ->assertSee('DASHBOARD')
            ->assertStatus(200);
    }

    /** @test */
    public function the_guests_are_redirected_to_login_page_when_try_to_access_a_route_that_requires_a_group_authorisation(): void
    {
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function the_guests_can_visit_routes_whitch_are_not_protected_by_group_authorization()
    {
        $this->get(route('welcome'))
            ->assertStatus(200);
    }
}
