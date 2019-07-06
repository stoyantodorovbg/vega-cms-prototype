<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Group;
use App\Models\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_route_can_be_created_trough_the_console(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_properties_of_the_created_trough_the_console_route_are_validated_as_unique(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test');
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->assertCount(1, Route::where('url', '/test')->get());
        $this->assertCount(1, Route::where('action', 'Front\TestsController@test')->get());
        $this->assertCount(1, Route::where('name', 'test.test')->get());

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_create_route_console_command_returns_related_output(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test')
            ->expectsOutput('The route is generated successfully.');

        $this->artisan('generate:route /test get TestsController@test test.test')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The url has already been taken.')
            ->expectsOutput('The action has already been taken.')
            ->expectsOutput('The name has already been taken.');

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_route_url_format_is_validated(): void
    {
        $this->artisan('generate:route /test~ get TestsController@test1 test.test1');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test~',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test/,{user} get TestsController@test2 test.test2');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test/,{user}',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test/{user} get TestsController@test3 test.test3');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/{user}',
            'action' => 'Front\TestsController@test3',
            'name' => 'test.test3',
        ]);

        $this->artisan('destroy:route test.test3');
    }

    /** @test */
    public function the_route_action_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test1 get TestsControllertest test.test1');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'action' => 'Front\TestsControllertest',
            'name' => 'test.test1',
        ]);

        $this->artisan('generate:route /test2 get TestsController@test! test.test2');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'action' => 'Front\TestsController@test!',
            'name' => 'test.test2',
        ]);

        $this->artisan('generate:route /test3 get Test,Controller@test! test.test3');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'action' => 'Front\Test,Controller@test',
            'name' => 'test.test3',
        ]);

        $this->artisan('generate:route /test/test get TestsController@testMethod test.test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test',
            'action' => 'Front\TestsController@testMethod',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_route_name_is_validated_for_appropriate_format(): void
    {
        $this->artisan('generate:route /test1 get TestsController@test1 test.test%');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test%',
        ]);

        $this->artisan('generate:route /test2 get TestsController@test2 test.test^)');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test^)',
        ]);

        $this->artisan('generate:route /test/test/{test} get TestsController@testTest test.test-test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}',
            'action' => 'Front\TestsController@testTest',
            'name' => 'test.test-test',
        ]);

        $this->artisan('destroy:route test.test-test');

        $this->artisan('generate:route /test/test/{test}3 get TestsController@testTest3 test.test_test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test/test/{test}3',
            'action' => 'Front\TestsController@testTest3',
            'name' => 'test.test_test',
        ]);

        $this->artisan('destroy:route test.test_test');
    }

    /** @test */
    public function the_route_can_has_only_certain_methods(): void
    {
        $this->artisan('generate:route /test1 get1 TestsController@test1 test.test')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'get1',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test',
        ]);

        $this->artisan('generate:route /test1 get TestsController@test1 test.test')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');

        $this->artisan('generate:route /test2 post$ TestsController@test2 test.test-test')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'post$',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test-test',
        ]);

        $this->artisan('generate:route /test2 post TestsController@test2 test.test-test')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test2',
            'method' => 'post',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test-test',
        ]);

        $this->artisan('destroy:route test.test-test');

        $this->artisan('generate:route /test3 patch$ TestsController@test3 test.test-test-test')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'method' => 'patch$',
            'action' => 'Front\TestsController@test3',
            'name' => 'test.test-test-test',
        ]);

        $this->artisan('generate:route /test3 patch TestsController@test3 test.test-test-test')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test3',
            'method' => 'patch',
            'action' => 'Front\TestsController@test3',
            'name' => 'test.test-test-test',
        ]);

        $this->artisan('destroy:route test.test-test-test');

        $this->artisan('generate:route /test4 put+ TestsController@test4 test.test-_')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test4',
            'method' => 'put+',
            'action' => 'Front\TestsController@test4',
            'name' => 'test.test-_',
        ]);

        $this->artisan('generate:route /test4 put TestsController@test4 test.test-_')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test4',
            'method' => 'put',
            'action' => 'Front\TestsController@test4',
            'name' => 'test.test-_',
        ]);

        $this->artisan('destroy:route test.test-_');

        $this->artisan('generate:route /test5 deleteu TestsController@test5 test.test5')
            ->expectsOutput('The method format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test5',
            'method' => 'deleteu',
            'action' => 'Front\TestsController@test5',
            'name' => 'test.test5',
        ]);

        $this->artisan('generate:route /test5 delete TestsController@test5 test.test5')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test5',
            'method' => 'delete',
            'action' => 'Front\TestsController@test5',
            'name' => 'test.test5',
        ]);

        $this->artisan('destroy:route test.test5');
    }

    /** @test */
    public function the_route_can_be_added_only_to_certain_route_files(): void
    {
        $this->artisan('generate:route /test1 get TestsController@test1 test.test weba')
            ->expectsOutput('The route type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test',
            'route_type' => 'weba',

        ]);

        $this->artisan('generate:route /test1 get TestsController@test1 test.test')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test1',
            'method' => 'get',
            'action' => 'Front\TestsController@test1',
            'name' => 'test.test',
            'route_type' => 'web',
        ]);

        $this->artisan('destroy:route test.test');

        $this->artisan('generate:route /test2 get TestsController@test2 test.test2 admin%')
            ->expectsOutput('The route type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test2',
            'method' => 'get',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test2',
            'route_type' => 'admin%',

        ]);

        $this->artisan('generate:route /test2 get TestsController@test2 test.test2 admin')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test2',
            'method' => 'get',
            'action' => 'Front\TestsController@test2',
            'name' => 'test.test2',
            'route_type' => 'admin',
        ]);

        $this->artisan('destroy:route test.test2');

        $this->artisan('generate:route /test3 get TestsController@test3 test.test3 page?')
            ->expectsOutput('The route type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test3',
            'method' => 'get',
            'action' => 'Front\TestsController@test3',
            'name' => 'test.test3',
            'route_type' => 'page?',

        ]);

        $this->artisan('generate:route /test3 get TestsController@test3 test.test3 page')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test3',
            'method' => 'get',
            'action' => 'Front\TestsController@test3',
            'name' => 'test.test3',
            'route_type' => 'page',
        ]);

        $this->artisan('destroy:route test.test3');

        $this->artisan('generate:route /test4 get TestsController@test4 test.test4 api:')
            ->expectsOutput('The route type format is invalid.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test4',
            'method' => 'get',
            'action' => 'Front\TestsController@test4',
            'name' => 'test.test4',
            'route_type' => 'api:',

        ]);

        $this->artisan('generate:route /test4 get TestsController@test4 test.test4 api')
            ->expectsOutput('The route is generated successfully.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test4',
            'method' => 'get',
            'action' => 'Front\TestsController@test4',
            'name' => 'test.test4',
            'route_type' => 'api',
        ]);

        $this->artisan('destroy:route test.test4');
    }

    /** @test */
    public function the_route_can_be_deleted(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
        ]);

    }

    /** @test */
    public function the_destroy_route_command_returns_appropriate_message_when_the_route_is_deleted(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->artisan('destroy:route test.test')
            ->expectsOutput('The route is destroyed.');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
        ]);
    }

    /** @test */
    public function the_route_name_from_destroy_route_command_is_validated(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->artisan('destroy:route test.test~')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The selected name is invalid.')
            ->expectsOutput('The name format is invalid.');

        $this->artisan('destroy:route test.test1')
            ->expectsOutput('Validation failed:')
            ->expectsOutput('The selected name is invalid.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
        ]);

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function sync_route_command_add_the_missing_in_db_routes_from_the_files(): void
    {
        $this->artisan('generate:route /test get TestsController@test test.test1');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test1',
            'route_type' => 'web',
        ]);

        $route = Route::where('name', 'test.test1')->first();
        $route->delete();

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test1',
            'route_type' => 'web',
        ]);

        $this->artisan('sync:routes')
            ->expectsOutput('A route with name test.test1, url /test, action Front\TestsController@test is stored in DB.');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'method' => 'get',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test1',
            'route_type' => 'web',
        ]);
        $this->artisan('destroy:route test.test1');
    }

    /** @test */
    public function a_route_can_be_attached_to_group_through_the_console(): void
    {
        $this->artisan('generate:group group');
        $this->artisan('generate:route /test get TestsController@test test.test');

        $this->artisan('attach:route-to-group test.test group');

        $route = Route::where('name', 'test.test')->first();
        $group = Group::where('title', 'group')->first();

        $this->assertEquals($route->name, $group->routes[0]->name);
        $this->assertEquals($group->title, $route->groups[0]->title);

        $this->artisan('destroy:group group');
        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function a_route_can_be_detached_from_group_through_console_command(): void
    {
        $this->artisan('generate:group group');
        $this->artisan('generate:route /test get TestsController@test test.test');
        $this->artisan('attach:route-to-group test.test group');
        $this->artisan('detach:route-from-group test.test group');

        $route = Route::where('name', 'test.test')->first();
        $group = Group::where('title', 'group')->first();

        $this->assertEquals(0, $route->groups()->count());
        $this->assertEquals(0, $group->routes()->count());


        $this->artisan('destroy:group group');
        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function route_create_command_receives_optional_parameters()
    {
        $this->artisan('generate:route /test get TestsController@test test.test api');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'Front\TestsController@test',
            'name' => 'test.test',
            'route_type' => 'api'
        ]);

        $this->artisan('destroy:route test.test');

        $this->artisan('generate:route /test get TestsController@test test.test api admin');

        $this->assertDatabaseHas('routes', [
            'url' => '/test',
            'action' => 'Admin\TestsController@test',
            'name' => 'test.test',
            'route_type' => 'api',
        ]);

        $this->artisan('destroy:route test.test');
    }

    /** @test */
    public function the_format_of_action_type_parameter_is_validated_properly()
    {
        $this->artisan('generate:route /test get TestsController@test test.test api admina');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'Admina/TestsController@test',
            'name' => 'test.test',
            'route_type' => 'api',
        ]);

        $this->artisan('generate:route /test get TestsController@test test.test api pesho');

        $this->assertDatabaseMissing('routes', [
            'url' => '/test',
            'action' => 'Pesho/TestsController@test',
            'name' => 'test.test',
            'route_type' => 'api',
        ]);
    }
}
