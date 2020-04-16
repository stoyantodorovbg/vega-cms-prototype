<?php

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Locale::class)->create([
            'language' => 'Bulgarian',
            'status' => 1,
            'code' => 'bg',
        ]);

        factory(Locale::class)->create([
            'language' => 'English',
            'status' => 1,
            'code' => 'en',
        ]);

        factory(Locale::class)->create([
            'language' => 'Italian',
            'status' => 1,
            'code' => 'i',
        ]);
    }
}
