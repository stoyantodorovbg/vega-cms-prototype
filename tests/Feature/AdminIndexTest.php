<?php

namespace Tests\Feature;

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
}
