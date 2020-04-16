<?php

use App\Models\Page;
use App\Models\Container;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PageTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $page = factory(Page::class)->create([
            'url' => '/test-page',
            'status' => 1,
            'col_width' => 12,
            'title' => 'Test Page',
            'description' => 'Test Page Description',
            'outer_row_classes' => '',
            'inner_row_classes' => 'p-3',
            'classes' => '',
            'styles' => json_encode([
                'border' => '1px solid blue',
                'structure' => [
                    'border' => [
                        'type' => 'text'
                    ],
                ]
            ]),
            'meta_tags' => json_encode([
                'keywords' => [],
                'structure' => [
                    'keywords' => [
                        'type' => 'json',
                        'nested' => [],
                    ],
                ]
            ]),
        ]);

        $header = factory(Container::class)->create([
            'semantic_tag' => 'header',
            'status' => 1,
            'row_position' => 1,
            'col_width' => 12,
            'col_position' => 1,
            'row_classes' => 'm-2',
            'classes' => 'p-2',
            'title' => json_encode([
                'semantic_tag' => 'h2',
                'col_width' => 12,
                'text' => 'Test Page Header',
                'status' => 1,
                'row_classes' => 'm-2 justify-content-md-center',
                'classes' => 'font-weight-bold text-capitalize text-center',
                'styles' => [
                    'color' => 'blue',
                    'font-size' => 20
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => 'It is a test page header',
                'status' => 1,
                'row_classes' => 'm-2 justify-content-md-center',
                'classes' => 'text-center',
                'styles' => [
                    'color' => 'black',
                    'font-size' => 10
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]),
            'styles' => json_encode([
                'background' => 'white',
                'border' => '1px solid black'
            ]),
        ]);

        $mainContainer = factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'div',
            'col_width' => 12,
            'row_position' => 2,
            'col_position' => 1,
            'row_classes' => 'm-4 justify-content-md-center',
            'classes' => '',
            'title' => json_encode([
                'semantic_tag' => 'h2',
                'col_width' => 12,
                'text' => 'Test Page Body',
                'status' => 1,
                'row_classes' => 'justify-content-md-center',
                'classes' => 'text-center font-weight-bold text-capitalize m-2',
                'styles' => [
                    'color' => 'blue',
                    'font-size' => 20
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => 'It is a test page summary',
                'status' => 1,
                'row_classes' => 'm-2 justify-content-md-center',
                'classes' => 'text-center m-1',
                'styles' => [
                    'color' => 'black',
                    'font-size' => 14
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => $faker->text(500),
                'status' => 1,
                'row_classes' => 'm-2',
                'classes' => 'text-center text-capitalize',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'styles' => json_encode([
                'background' => '#F0FFFF',
                'border' => '1px solid black',
            ]),
        ]);

        $articleContainer = factory(Container::class)->create([
            'semantic_tag' => 'div',
            'status' => 1,
            'row_position' => 1,
            'col_width' => 12,
            'col_position' => 1,
            'row_classes' => 'p-2',
            'classes' => 'm-2',
            'title' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'styles' => json_encode([
                'background' => 'white',
                'border' => '1px solid black'
            ]),
        ]);

        $mainContainer->childContainers()->attach([$articleContainer->id]);

        $article1Wrapper = factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'div',
            'row_position' => 1,
            'col_width' => 6,
            'col_position' => 1,
            'row_classes' => 'm-0',
            'classes' => 'p-2',
            'title' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]),
            'styles' => json_encode([
                'background' => 'white',
            ]),
        ]);

        $article2Wrapper = factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'div',
            'row_position' => 1,
            'col_width' => 6,
            'col_position' => 1,
            'row_classes' => 'm-0',
            'classes' => 'p-2',
            'title' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => '',
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => []
                    ]
                ]
            ]),
            'styles' => json_encode([
                'background' => 'white',
            ]),
        ]);

        $articleContainer->childContainers()->attach([$article1Wrapper->id, $article2Wrapper->id]);

        $article1 = factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'article',
            'row_position' => 1,
            'col_width' => 12,
            'col_position' => 1,
            'row_classes' => 'justify-content-md-center',
            'classes' => 'p-1',
            'title' => json_encode([
                'semantic_tag' => 'h3',
                'col_width' => 12,
                'text' => 'Article 1',
                'status' => 1,
                'heading' => 3,
                'row_classes' => '',
                'classes' => 'font-weight-bold text-capitalize text-center',
                'styles' => [
                    'color' => 'blue',
                    'font-size' => 16
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => 'It is a test article 1',
                'status' => 1,
                'row_classes' => '',
                'classes' => 'm-1 font-italic',
                'styles' => [
                    'color' => 'black',
                    'font-weight' => 'italic',
                    'font-size' => 14
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-weight' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => [
                    [
                        'tag' => 'span',
                        'content' => $faker->text(100)
                    ],
                    [
                        'tag' => 'a',
                        'href' => 'https://google.com',
                        'target' => '_blank',
                        'content' => 'Google'
                    ],
                    [
                        'tag' => 'span',
                        'content' => $faker->text(100)
                    ]
                ],
                'status' => 1,
                'row_classes' => '',
                'classes' => 'text-capitalize m-1',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'json',
                        'nested' => [
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'content' => [
                                        'type' => 'text'
                                    ]
                                ]
                            ],
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'href' => [
                                        'type' => 'text'
                                    ],
                                    'target' => [
                                        'type' => 'text'
                                    ],
                                    'content' => [
                                        'type' => 'text'
                                    ]
                                ]
                            ],
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'content' => [
                                        'type' => 'text'
                                    ]
                                ]
                            ],
                        ]
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [],
                    ]
                ]
            ]),
            'styles' => json_encode([
                'background' => '#FAEBD7',
                'border' => '1px solid black'
            ]),
        ]);

        $article1Wrapper->childContainers()->attach([$article1->id]);

        $article2 = factory(Container::class)->create([
            'status' => 1,
            'semantic_tag' => 'article',
            'row_position' => 1,
            'col_width' => 12,
            'col_position' => 1,
            'row_classes' => 'justify-content-md-center',
            'classes' => 'p-1',
            'title' => json_encode([
                'semantic_tag' => 'h3',
                'col_width' => 12,
                'text' => 'Article 2',
                'status' => 1,
                'heading' => 3,
                'row_classes' => '',
                'classes' => 'font-weight-bold text-capitalize text-center p-1',
                'styles' => [
                    'color' => 'blue',
                    'font-size' => 16
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => 'It is a test article 2',
                'status' => 1,
                'row_classes' => '',
                'classes' => 'm-1 font-italic',
                'styles' => [
                    'color' => 'black',
                    'font-weight' => 'italic',
                    'font-size' => 14
                ],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'text'
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => [
                        'type' => 'json',
                        'nested' => [
                            'color' => [
                                'type' => 'text'
                            ],
                            'font-weight' => [
                                'type' => 'text'
                            ],
                            'font-size' => [
                                'type' => 'text'
                            ],
                        ],
                    ]
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => [
                    0 => [
                        'tag' => 'a',
                        'href' => 'https://google.com',
                        'target' => '_blank',
                        'content' => [
                            [
                                'tag' => 'img',
                                'src' => '/storage/images/Essential-images.jpg',
                                'alt' => 'example-image',
                                'class' => '',
                                'style' => [
                                    'width' => '30px',
                                    'height' => '30px',
                                ]
                            ]
                        ],
                    ],
                    1 => [
                        'tag' => 'span',
                        'content' => $faker->text(100)
                    ],
                    2 => [
                        'tag' => 'img',
                        'src' => '/storage/images/Essential-images.jpg',
                        'alt' => 'example-image',
                        'class' => '',
                        'style' => [
                            'width' => '30px',
                            'height' => '30px',
                        ]
                    ],
                    3 => [
                        'tag' => 'span',
                        'content' => $faker->text(100)
                    ]
                ],
                'status' => 1,
                'row_classes' => '',
                'classes' => 'text-capitalize m-1',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => [
                        'type' => 'text'
                    ],
                    'col_width' => [
                        'type' => 'text'
                    ],
                    'text' => [
                        'type' => 'json',
                        'nested' => [
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'href' => [
                                        'type' => 'text'
                                    ],
                                    'target' => [
                                        'type' => 'text'
                                    ],
                                    'content' => [
                                        'type' => 'json',
                                        'nested' => [
                                            [
                                                'type' => 'json',
                                                'nested' => [
                                                    'tag' => [
                                                        'type' => 'text'
                                                    ],
                                                    'src' => [
                                                        'type' => 'text'
                                                    ],
                                                    'alt' => [
                                                        'type' => 'text'
                                                    ],
                                                    'class' => [
                                                        'type' => 'text'
                                                    ],
                                                    'style' => [
                                                        'type' => 'json',
                                                        'nested' => [
                                                            'width' => [
                                                                'type' => 'text'
                                                            ],
                                                            'height' => [
                                                                'type' => 'text'
                                                            ],
                                                        ]
                                                    ],
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                            ],
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'content' => [
                                        'type' => 'text'
                                    ]
                                ]
                            ],
                            [
                                'type' => 'json',
                                'nested' => [
                                    'tag' => [
                                        'type' => 'text'
                                    ],
                                    'src' => [
                                        'type' => 'text'
                                    ],
                                    'alt' => [
                                        'type' => 'text'
                                    ],
                                    'class' => [
                                        'type' => 'text'
                                    ],
                                    'style' => [
                                        'type' => 'json',
                                        'nested' => [
                                            'width' => [
                                                'type' => 'text'
                                            ],
                                            'height' => [
                                                'type' => 'text'
                                            ],
                                        ]
                                    ],
                                ]
                            ],
                        ]
                    ],
                    'status' => [
                        'type' => 'text'
                    ],
                    'row_classes' => [
                        'type' => 'text'
                    ],
                    'classes' => [
                        'type' => 'text'
                    ],
                    'styles' => []
                ]
            ]),
            'styles' => json_encode([
                'background' => '#FAEBD7',
                'border' => '1px solid black'
            ]),
        ]);

        $article2Wrapper->childContainers()->attach([$article2->id]);

        $footer = factory(Container::class)->create([
            'semantic_tag' => 'footer',
            'status' => 1,
            'row_position' => 3,
            'col_width' => 12,
            'col_position' => 1,
            'row_classes' => 'p-3',
            'classes' => 'p-2',
            'title' => json_encode([
                'semantic_tag' => 'h4',
                'col_width' => 12,
                'text' => 'Test Page Footer',
                'status' => 1,
                'heading' => 4,
                'row_classes' => '',
                'classes' => 'text-right text-capitalize text-center',
                'styles' => [
                    'color' => 'blue',
                    'font-size' => 14
                ],
                'structure' => [
                    'semantic_tag' => 'div',
                    'col_width' => 12,
                    'text' => '',
                    'row_classes' => '',
                    'status' => 0,
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'summary' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => 'It is a test page footer',
                'status' => 1,
                'row_classes' => '',
                'classes' => 'text-center font-italic',
                'styles' => [
                    'color' => 'black',
                    'font-size' => 10
                ],
                'structure' => [
                    'semantic_tag' => 'div',
                    'col_width' => 12,
                    'text' => '',
                    'status' => 0,
                    'row_classes' => '',
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'body' => json_encode([
                'semantic_tag' => 'div',
                'col_width' => 12,
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => 'p-1',
                'styles' => [],
                'structure' => [
                    'semantic_tag' => 'div',
                    'col_width' => 12,
                    'text' => '',
                    'status' => 0,
                    'row_classes' => '',
                    'classes' => '',
                    'styles' => []
                ]
            ]),
            'styles' => json_encode([]),
        ]);


        $page->containers()->attach([$header->id, $mainContainer->id, $footer->id]);
    }
}
