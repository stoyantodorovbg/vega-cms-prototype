<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface GroupRepositoryInterface
{
    /**
     * Get the names of all user groups
     *
     * @param User $user
     * @param string $groupTitle
     * @return array
     */
    public function getUserGroupsTitles(User $user, string $groupTitle): array;
}
