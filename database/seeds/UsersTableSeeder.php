<?php

use App\User;
use App\Models\Group;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $groups = Group::all();

        //Admin id 1
        $admin = factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
        ]);
        $admin->groups()->attach([1]);
        $groups->pull(0);

        //Moderator id 2
        $moderator = factory(User::class)->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'password' => bcrypt('secret'),
        ]);
        $moderator->groups()->attach([2]);
        $groups->pull(1);

        //User id 3
        $user = factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('secret'),
        ]);
        $user->groups()->attach([3]);

        $users = factory(User::class, 20)->create();

        $users->each(function ($user) use ($groups) {
            $user->groups()->saveMany($groups);
        });
    }
}
