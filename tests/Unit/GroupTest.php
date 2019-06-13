<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\Models\Group;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_group_may_has_users()
    {
        $group = factory(Group::class)->create();

        $users = factory(User::class, 5)->create();

        $group->users()->saveMany($users);

        $this->assertEquals(5, $group->users->count());
        $this->assertInstanceOf(User::class, $group->users[0]);
    }
}
