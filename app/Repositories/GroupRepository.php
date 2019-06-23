<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\GroupRepositoryInterface;

class GroupRepository implements GroupRepositoryInterface
{
    /**
     * Get the names of all user groups
     *
     * @param User $user
     * @param string $groupTitle
     * @return array
     */
    public function getUserGroupsTitles(User $user, string $groupTitle): array
    {
        return DB::table('groups')
            ->select('groups.title')
            ->join('group_user', 'groups.id', '=', 'group_user.group_id')
            ->where('group_user.user_id', $user->id)
            ->where('groups.title', $groupTitle)
            ->get();
    }
}
