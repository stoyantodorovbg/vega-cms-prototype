<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(LocalesTableSeeder::class);
        $this->call(PhrasesTableSeeder::class);
        $this->call(MenuTableSeeder ::class);
        $this->call(DefaultJsonStructureTableSeeder ::class);
        $this->call(PageTestTableSeeder ::class);
        $this->call(HomePageTableSeeder ::class);
        $this->call(ContainersTableSeeder ::class);
    }
}
