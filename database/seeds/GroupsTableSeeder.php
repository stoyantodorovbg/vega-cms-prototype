<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Admins id 1
        factory(Group::class)->create([
            'title' => 'admins',
            'description' => 'All rights.',
        ]);

        // Moderators id 2
        factory(Group::class)->create([
            'title' => 'moderators',
            'description' => 'Some back office rights',
        ]);

        // Ordinary users id 3
        factory(Group::class)->create([
            'title' => 'Ordinary users',
            'description' => 'Only front end rights',
        ]);

        factory(Group::class, 5)->create();
    }
}
