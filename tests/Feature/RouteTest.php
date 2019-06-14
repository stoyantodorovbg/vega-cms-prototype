<?php

namespace Tests\Feature;

use App\Models\Route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_route_can_be_created_trough_the_console(): void
    {
        $this->artisan('generate:route /test TestController@test test.test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'TestController@test',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_properties_of_the_created_trough_the_console_route_are_validated_as_unique(): void
    {
        $this->artisan('generate:route /test TestController@test test.test');
        $this->artisan('generate:route /test TestController@test test.test');

        $this->assertCount(1, Route::where('url', '/test')->get());
        $this->assertCount(1, Route::where('method', 'TestController@test')->get());
        $this->assertCount(1, Route::where('name', 'test.test')->get());
    }

    /** @test */
    public function the_create_route_console_command_returns_related_output(): void
    {
        $this->artisan('generate:route /test TestController@test test.test')
            ->expectsOutput('The route is generated successfully.');

        $this->artisan('generate:route /test TestController@test test.test')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The url has already been taken.')
            ->expectsOutput('The method has already been taken.')
            ->expectsOutput('The name has already been taken.');
    }
}
