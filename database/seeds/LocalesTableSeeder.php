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
            'code' => 'bg',
        ]);

        factory(Locale::class)->create([
            'language' => 'English',
            'code' => 'en',
        ]);

        factory(Locale::class)->create([
            'language' => 'Italian',
            'code' => 'i',
        ]);
    }
}
