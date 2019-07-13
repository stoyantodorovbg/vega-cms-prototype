<?php

use App\Models\Phrase;
use Illuminate\Database\Seeder;

class PhrasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Phrase::class, 50)->create();
    }
}
