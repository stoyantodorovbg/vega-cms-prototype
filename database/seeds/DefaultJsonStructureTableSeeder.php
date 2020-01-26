<?php

use Illuminate\Database\Seeder;
use App\Models\DefaultJsonStructure;

class DefaultJsonStructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menu
        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\\Models\\Menu',
                'title',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\\Models\\Menu',
                'description',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\Models\Menu',
                'styles',
                json_encode([])
            ));

        // MenuItem
        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\\Models\\MenuItem',
                'title',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\\Models\\MenuItem',
                'description',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                'App\Models\MenuItem',
                'styles',
                json_encode([])
            ));
    }

    /**
     * Get default structure
     *
     * @param string $model
     * @param string $field
     * @param array $structure
     * @return array
     */
    protected function getDefaultStructure(string $model, string $field, string $structure): array
    {
        return [
            'model' => $model,
            'field' => $field,
            'structure' => $structure
        ];
    }

    /**
     * Get default structure for a menu unit
     *
     * @return array
     */
    protected function getDefaultMenuUnitStructure(): string
    {
        return json_encode([
            'structure' => [
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => [

                ],
                'structure' => [
                    'text' => [
                        'type' => 'text',
                    ],
                    'status' => [
                        'type' => 'text',
                    ],
                    'classes' => [
                        'type' => 'text',
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]
        ]);
    }
}
