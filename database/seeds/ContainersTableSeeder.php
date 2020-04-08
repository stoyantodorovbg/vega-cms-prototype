<?php

use App\Models\Container;
use Illuminate\Database\Seeder;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'body',
            'row_position' => 2,
            'col_width' => 8,
            'col_position' => 1,
            'classes' => '',
            'title' => json_encode([
                'text' => 'Test Body Title',
                'status' => 1,
                'classes' => '',
                'styles' => [
                    'color' => 'red'
                ],
                'structure' => [
                    'text' => '',
                    'status' => 0,
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'summary' => json_encode([
                'text' => 'Test Body Summary',
                'status' => 1,
                'classes' => '',
                'styles' => [
                    'color' => 'red'
                ],
                'structure' => [
                    'text' => '',
                    'status' => 0,
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'body' => json_encode([
                'text' => 'Test Body Body',
                'status' => 1,
                'classes' => '',
                'styles' => [
                    'color' => 'red'
                ],
                'structure' => [
                    'text' => '',
                    'status' => 0,
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'styles' => json_encode([
                'structure' => []
            ]),
        ]);
    }
}
