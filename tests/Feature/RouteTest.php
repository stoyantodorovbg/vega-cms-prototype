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

    /** @test */
    public function the_route_url_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test~ TestController@test1 test.test1');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test~',
            'method' => 'TestController@test1',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test/,{user} TestController@test2 test.test2');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test/,{user}',
            'method' => 'TestController@test2',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test/{user} TestController@test3 test.test3');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/{user}',
            'method' => 'TestController@test3',
            'name' => 'test.test3',
        ]);

    }

    /** @test */
    public function the_route_method_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test1 TestControllertest test.test1');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'TestControllertest',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test2 TestController@test! test.test2');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'TestController@test!',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test3 Test,Controller@test! test.test3');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'method' => 'Test,Controller@test',
            'name' => 'test.test3',
        ]);

        $this->artisan('generate:route /test/test TestController@testMethod test.test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test',
            'method' => 'TestController@testMethod',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_route_name_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test1 TestController@test1 test.test%');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'TestController@test1',
            'name' => 'test.test%',
        ]);

        $this->artisan('generate:route /test2 TestController@test2 test.test^)');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'TestController@test2',
            'name' => 'test.test^)',
        ]);

        $this->artisan('generate:route /test/test/{test} TestController@testTest test.test-test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}',
            'method' => 'TestController@testTest',
            'name' => 'test.test-test',
        ]);

        $this->artisan('generate:route /test/test/{test}3 TestController@testTest3 test.test_test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}3',
            'method' => 'TestController@testTest3',
            'name' => 'test.test_test',
        ]);

    }
}
