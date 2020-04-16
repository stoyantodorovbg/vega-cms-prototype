<?php

use App\Models\Page;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Container;
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
                Menu::class,
                'title',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Menu::class,
                'description',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Menu::class,
                'styles',
                json_encode([])
            ));

        // MenuItem
        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                MenuItem::class,
                'title',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                MenuItem::class,
                'description',
                $this->getDefaultMenuUnitStructure()
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                MenuItem::class,
                'styles',
                json_encode([])
            ));

        // Page
        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Page::class,
                'styles',
                json_encode([])
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Page::class,
                'meta_tags',
                json_encode([])
            ));

        // Container
        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Container::class,
                'title',
                json_encode([])
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Container::class,
                'summary',
                json_encode([])
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Container::class,
                'body',
                json_encode([])
            ));

        factory(DefaultJsonStructure::class)
            ->create($this->getDefaultStructure(
                Container::class,
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
