<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class)->create([
            'url' => '/test-page',
            'status' => 1,
            'title' => 'Test Page Title',
            'description' => 'Test Page Description',
            'classes' => '',
            'styles' => json_encode([
                'structure' => []
            ]),
            'meta_tags' => json_encode([
                'keywords' => 'test-page',
                'charset' => 'UTF-8',
            ]),
        ]);
    }
}
