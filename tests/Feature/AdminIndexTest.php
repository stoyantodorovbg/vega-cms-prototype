<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Group;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_models_API_requires_admins_rights()
    {
        $this->json('GET', route('api-admin.index'), [
            'model' => 'Group'
        ])->assertStatus(401)->assertExactJson(['error' => 'Unauthenticated.']);

        $this->authenticate();
        factory(Group::class, 5)->create();

        $this->json('GET', route('api-admin.index'), [
            'model' => 'Group'
        ])->assertStatus(401)->assertExactJson(['error' => 'Unauthenticated.']);
    }

    /** @test */
    public function all_items_from_a_model_can_be_fetched()
    {
        $this->authenticate(null, 'admins');

        factory(Group::class, 5)->create();

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group'
        ])->assertStatus(200);

        $this->assertJson($response->content());
        $this->assertEquals(8, collect(json_decode($response->content(), true))->count());
        $this->assertEquals('admins', collect(json_decode($response->content(), true))->first()['title']);
    }

    /** @test */
    public function the_model_items_could_be_searched_by_exact_matching()
    {
        $this->withoutExceptionHandling();
        $this->authenticate(null, 'admins');

        factory(Group::class, 5)->create([
            'status' => 0,
        ]);

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'status' => [
                    'types' => [
                        'exact' => [
                            'value' => 1,
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(3, collect(json_decode($response->content(), true))->count());

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'status' => [
                    'types' => [
                        'exact' => [
                            'value' => 0,
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(5, collect(json_decode($response->content(), true))->count());

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'title' => [
                    'types' => [
                        'exact' => [
                            'value' => 'admins',
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(1, collect(json_decode($response->content(), true))->count());
        $this->assertEquals('admins', collect(json_decode($response->content(), true))->first()['title']);

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'title' => [
                    'types' => [
                        'exact' => [
                            'value' => 'admin',
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(0, collect(json_decode($response->content(), true))->count());
    }

    /** @test */
    public function the_model_items_could_be_searched_by_partial_matching()
    {
        $this->withoutExceptionHandling();
        $this->authenticate(null, 'admins');

        factory(Group::class, 5)->create();

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'title' => [
                    'types' => [
                        'like' => [
                            'value' => 'adm',
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(1, collect(json_decode($response->content(), true))->count());
        $this->assertEquals('admins', collect(json_decode($response->content(), true))->first()['title']);
    }

    /** @test */
    public function the_model_items_could_be_searched_by_greater_then_value()
    {
        $this->withoutExceptionHandling();
        $this->authenticate(null, 'admins');

        factory(Group::class, 5)->create([
            'created_at' => Carbon::now()->subWeek()
        ]);

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'created_at' => [
                    'types' => [
                        'greaterThen' => [
                            'value' => Carbon::now()->subDay(),
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(3, collect(json_decode($response->content(), true))->count());
    }

    /** @test */
    public function the_model_items_could_be_searched_by_less_then_value()
    {
        $this->withoutExceptionHandling();
        $this->authenticate(null, 'admins');

        factory(Group::class, 5)->create([
            'created_at' => Carbon::now()->subWeek()
        ]);

        $response = $this->json('GET', route('api-admin.index'), [
            'model' => 'Group',
            'filters' => json_encode([
                'created_at' => [
                    'types' => [
                        'lessThen' => [
                            'value' => Carbon::now()->subDay(),
                        ]
                    ]
                ]
            ])
        ])->assertStatus(200);

        $this->assertEquals(5, collect(json_decode($response->content(), true))->count());
    }
}
