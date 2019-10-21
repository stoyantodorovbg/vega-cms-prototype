<?php

namespace Tests;

use App\Models\User;
use App\Models\Group;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create an user, authenticate him, assign groups to him
     *
     * @param User|null $user
     * @param string|null $groupName
     * @return User
     */
    protected function authenticate(User $user = null, string $groupName = null) : User
    {
        if (! $user) {
            $user = factory(User::class)->create();
        }

        if($groupName) {
            $this->assignGroups($user, $groupName);
        }

        $this->actingAs($user);

        return $user;
    }

    /**
     * Assign groups to an user
     *
     * @param User $user
     * @param string $groupName
     */
    protected function assignGroups(User $user, string $groupName): void
    {
        factory(Group::class)->create([
            'title' => 'admins',
            'description' => 'All rights.',
        ]);
        factory(Group::class)->create([
            'title' => 'moderators',
            'description' => 'Some back office rights',
        ]);
        factory(Group::class)->create([
            'title' => 'ordinaryUsers',
            'description' => 'Only front end rights',
        ]);

        switch ($groupName) {
            case 'admins':
                $user->groups()->attach([1, 2, 3]);
                break;
            case 'moderators':
                $user->groups()->attach([2, 3]);
                break;
            case 'ordinaryUsers':
                $user->groups()->attach([3]);
                break;
        }
    }
}
