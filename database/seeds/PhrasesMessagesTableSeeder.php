<?php

use App\Models\Phrase;
use Illuminate\Database\Seeder;

class PhrasesMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phrase::create([
            'system_name' => 'messages.deleted',
            'text' => [
                'en' => 'deleted!'
            ]
        ]);    }
}
