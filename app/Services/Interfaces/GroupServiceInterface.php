<?php

namespace App\Services\Interfaces;

use Illuminate\Foundation\Auth\User as Authenticatable;

interface GroupServiceInterface
{
    /**
     * Create a group
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Destroy a group
     *
     * @param array $data
     */
    public function destroy(array $data);

    /**
     * Check if a user has a group
     *
     * @param Authenticatable $user
     * @param string $groupTitle
     * @return bool
     */
    public function userHasGroup(Authenticatable $user, string $groupTitle): bool;
}
