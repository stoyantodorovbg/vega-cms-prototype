<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Route;
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

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_properties_of_the_created_trough_the_console_route_are_validated_as_unique(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->assertCount(1, Route::where('url', '/test')->get());
        $this->assertCount(1, Route::where('action', 'TestController@test')->get());
        $this->assertCount(1, Route::where('name', 'test.test')->get());

        $this->artisan('destroy:route test.test');
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

        $this->artisan('destroy:route test.test');
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

        $this->artisan('destroy:route test.test3');
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

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_route_name_is_validated_for_appropriate_format(): void
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

        $this->artisan('destroy:route test.test-test');

        $this->artisan('generate:route /test/test/{test}3 get TestController@testTest3 test.test_test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}3',
            'action' => 'TestController@testTest3',
            'name' => 'test.test_test',
        ]);

        $this->artisan('destroy:route test.test_test');
    }

    /** @test */
    public function the_route_can_has_only_certain_methods(): void
    {
        $this->artisan('generate:route /test1 get1 TestController@test1 test.test web')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'get1',
            'action' => 'TestController@test1',
            'name' => 'test.test',
        ]);

        $this->artisan('generate:route /test1 get TestController@test1 test.test web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'TestController@test1',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');

        $this->artisan('generate:route /test2 post$ TestController@test2 test.test-test web')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'post$',
            'action' => 'TestController@test2',
            'name' => 'test.test-test',
        ]);

        $this->artisan('generate:route /test2 post TestController@test2 test.test-test web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test2',
            'method' => 'post',
            'action' => 'TestController@test2',
            'name' => 'test.test-test',
        ]);

        $this->artisan('destroy:route test.test-test');

        $this->artisan('generate:route /test3 patch$ TestController@test3 test.test-test-test web')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'method' => 'patch$',
            'action' => 'TestController@test3',
            'name' => 'test.test-test-test',
        ]);

        $this->artisan('generate:route /test3 patch TestController@test3 test.test-test-test web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test3',
            'method' => 'patch',
            'action' => 'TestController@test3',
            'name' => 'test.test-test-test',
        ]);

        $this->artisan('destroy:route test.test-test-test');

        $this->artisan('generate:route /test4 put+ TestController@test4 test.test-_ web')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test4',
            'method' => 'put+',
            'action' => 'TestController@test4',
            'name' => 'test.test-_',
        ]);

        $this->artisan('generate:route /test4 put TestController@test4 test.test-_ web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test4',
            'method' => 'put',
            'action' => 'TestController@test4',
            'name' => 'test.test-_',
        ]);

        $this->artisan('destroy:route test.test-_');

        $this->artisan('generate:route /test5 deleteu TestController@test5 test.test5 web')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test5',
            'method' => 'deleteu',
            'action' => 'TestController@test5',
            'name' => 'test.test5',
        ]);

        $this->artisan('generate:route /test5 delete TestController@test5 test.test5 web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test5',
            'method' => 'delete',
            'action' => 'TestController@test5',
            'name' => 'test.test5',
        ]);

        $this->artisan('destroy:route test.test5');
    }

    /** @test */
    public function the_route_can_be_added_only_to_certain_route_files(): void
    {
        $this->artisan('generate:route /test1 get TestController@test1 test.test weba')
            ->expectsOutput('The type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'TestController@test1',
            'name' => 'test.test',
            'type' => 'weba',

        ]);

        $this->artisan('generate:route /test1 get TestController@test1 test.test web')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'TestController@test1',
            'name' => 'test.test',
            'type' => 'web',
        ]);

        $this->artisan('destroy:route test.test');

        $this->artisan('generate:route /test2 get TestController@test2 test.test2 admin%')
            ->expectsOutput('The type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'get',
            'action' => 'TestController@test2',
            'name' => 'test.test2',
            'type' => 'admin%',

        ]);

        $this->artisan('generate:route /test2 get TestController@test2 test.test2 admin')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test2',
            'method' => 'get',
            'action' => 'TestController@test2',
            'name' => 'test.test2',
            'type' => 'admin',
        ]);

        $this->artisan('destroy:route test.test2');

        $this->artisan('generate:route /test3 get TestController@test3 test.test3 page?')
            ->expectsOutput('The type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'method' => 'get',
            'action' => 'TestController@test3',
            'name' => 'test.test3',
            'type' => 'page?',

        ]);

        $this->artisan('generate:route /test3 get TestController@test3 test.test3 page')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test3',
            'method' => 'get',
            'action' => 'TestController@test3',
            'name' => 'test.test3',
            'type' => 'page',
        ]);

        $this->artisan('destroy:route test.test3');

        $this->artisan('generate:route /test4 get TestController@test4 test.test4 api:')
            ->expectsOutput('The type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test4',
            'method' => 'get',
            'action' => 'TestController@test4',
            'name' => 'test.test4',
            'type' => 'api:',

        ]);

        $this->artisan('generate:route /test4 get TestController@test4 test.test4 api')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test4',
            'method' => 'get',
            'action' => 'TestController@test4',
            'name' => 'test.test4',
            'type' => 'api',
        ]);

        $this->artisan('destroy:route test.test4');
    }

    /** @test */
    public function the_route_can_be_deleted(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'TestController@test',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'TestController@test',
            'name' => 'test.test',
        ]);

    }

    /** @test */
    public function the_destroy_route_command_returns_appropriate_message_when_the_route_is_deleted(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->artisan('destroy:route test.test')
            ->expectsOutput('The route is destroyed.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'TestController@test',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_route_name_from_destroy_route_command_is_validated(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->artisan('destroy:route test.test~')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The selected name is invalid.')
            ->expectsOutput('The name format is invalid.');

        $this->artisan('destroy:route test.test1')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The selected name is invalid.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'TestController@test',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function sync_route_command_add_the_missing_in_db_routes_from_the_files(): void
    {
        $this->artisan('generate:route /test get TestController@test test.test web');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test.test',
            'type' => 'web',
        ]);

        $route = Route::where('name', 'test.test')->first();
        $route->delete();

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test.test',
            'type' => 'web',
        ]);

        $this->artisan('sync:routes')
            ->expectsOutput('A route with name test.test, url /test, action TestController@test is stored in DB.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test.test',
            'type' => 'web',
        ]);
    }
}
