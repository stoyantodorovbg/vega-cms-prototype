<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create an user and authenticate him
     *
     * @param User|null $user
     * @return User
     */
    protected function authenticate(User $user = null) : User
    {
        if (! $user) {
            $user = factory(User::class)->create();
        }

        $this->actingAs($user);

        return $user;
    }
}
