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
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'TestController@test',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_properties_of_the_created_trough_the_console_route_are_validated_as_unique(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->assertCount(1, Route::where('url', '/test')->get());
        $this->assertCount(1, Route::where('action', 'TestController@test')->get());
        $this->assertCount(1, Route::where('name', 'test.test')->get());
    }

    /** @test */
    public function the_create_route_console_command_returns_related_output(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web')
            ->expectsOutput('The route is generated successfully.');

        $this->artisan('generate:route /test get TestController@test test.test web')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The url has already been taken.')
            ->expectsOutput('The action has already been taken.')
            ->expectsOutput('The name has already been taken.');
    }

    /** @test */
    public function the_route_url_format_is_validated(): void
    {
        $this->artisan('generate:route /test~ get TestController@test1 test.test1 web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test~',
            'action' => 'TestController@test1',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test/,{user} get TestController@test2 test.test2 web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test/,{user}',
            'action' => 'TestController@test2',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test/{user} get TestController@test3 test.test3 web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/{user}',
            'action' => 'TestController@test3',
            'name' => 'test.test3',
        ]);
    }

    /** @test */
    public function the_route_action_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test1 get TestControllertest test.test1 web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'action' => 'TestControllertest',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test2 get TestController@test! test.test2 web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'action' => 'TestController@test!',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test3 get Test,Controller@test! test.test3 web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'action' => 'Test,Controller@test',
            'name' => 'test.test3',
        ]);

        $this->artisan('generate:route /test/test get TestController@testMethod test.test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test',
            'action' => 'TestController@testMethod',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_route_name_is_validated_for_appropriate_format1(): void
    {
        $this->artisan('generate:route /test1 get TestController@test1 test.test% web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'action' => 'TestController@test1',
            'name' => 'test.test%',
        ]);

        $this->artisan('generate:route /test2 get TestController@test2 test.test^) web');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'action' => 'TestController@test2',
            'name' => 'test.test^)',
        ]);

        $this->artisan('generate:route /test/test/{test} get TestController@testTest test.test-test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}',
            'action' => 'TestController@testTest',
            'name' => 'test.test-test',
        ]);

        $this->artisan('generate:route /test/test/{test}3 get TestController@testTest3 test.test_test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}3',
            'action' => 'TestController@testTest3',
            'name' => 'test.test_test',
        ]);
    }
}