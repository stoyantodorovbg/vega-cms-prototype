<?php

namespace Tests\Unit;

use App\Models\Group;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_may_has_groups(): void
    {
        $user = factory(User::class)->create();

        $groups = factory(Group::class, 5)->create();

        $user->groups()->saveMany($groups);

        $this->assertEquals(5, $user->groups->count());
        $this->assertInstanceOf(Group::class, $user->groups[0]);
    }
}
