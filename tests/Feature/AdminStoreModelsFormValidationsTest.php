<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Phrase;
use App\Models\Locale;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminStoreModelsFormValidationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_form_validation()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-users.store'), [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ])->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
            'password' => 'The password field is required.'
        ]);

        $this->post(route('admin-users.store'), [
            'name' => 'ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt',
            'email' => '44',
            'password' => '333333333333',
            'password_confirmation' => '4433333333333'
        ])->assertSessionHasErrors([
            'name' => 'The name may not be greater than 30 characters.',
            'email' => 'The email must be a valid email address.',
            'password' => 'The password confirmation does not match.'
        ]);

        $this->post(route('admin-users.store'), [
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111',
            'password_confirmation' => '44444444444'
        ])->assertSessionHasErrors([
            'password' => 'The password may not be greater than 50 characters.'
        ]);

        factory(User::class)->create([
            'email' => 'test@email.com',
        ]);

        $this->post(route('admin-users.store'), [
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => 'testpass',
            'password_confirmation' => 'testpass'
        ])->assertSessionHasErrors([
            'email' => 'The email has already been taken.'
        ]);

        $this->post(route('admin-users.store'), [
            'name' => 'test',
            'email' => 'test1@email.com',
            'password' => 'test',
            'password_confirmation' => 'test'
        ])->assertSessionHasErrors([
            'password' => 'The password must be at least 5 characters.'
        ]);
    }

    /** @test */
    public function phrase_form_validation()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-phrases.store'), [
            'system_name' => '',
        ])->assertSessionHasErrors([
            'system_name' => 'The system name field is required.',
            'text' => 'The text field is required.'
        ]);

        $this->post(route('admin-phrases.store'), [
            'system_name' => 'test',
            'text' => '123'
        ])->assertSessionHasErrors([
            'text' => 'The text must be an array.'
        ]);

        factory(Phrase::class)->create([
            'system_name' => 'test',
            'text' => ['en' => 'test']
        ]);

        $this->post(route('admin-phrases.store'), [
            'system_name' => 'test',
            'text' => ['bg' => 'test']
        ])->assertSessionHasErrors([
            'system_name' => 'The system name has already been taken.'
        ]);
    }

    /** @test */
    public function locale_form_validation()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-locales.store'), [
            'language' => '',
            'code' => '',
            'status' => 3,
            'add_to_url' => 3
        ])->assertSessionHasErrors([
            'language' => 'The language field is required.',
            'code' => 'The code field is required.',
            'status' => 'The status must be between 0 and 1.',
            'add_to_url' => 'The add to url must be between 0 and 1.'
        ]);

        $this->post(route('admin-locales.store'), [
            'language' => 'Bulgariannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn',
            'code' => 'bgg',
            'status' => 11,
            'add_to_url' => 11
        ])->assertSessionHasErrors([
            'language' => 'The language may not be greater than 50 characters.',
            'code' => 'The code may not be greater than 2 characters.',
            'status' => 'The status must be between 0 and 1.',
            'add_to_url' => 'The add to url must be between 0 and 1.'
        ]);

        factory(Locale::class)->create([
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 1,
            'add_to_url' => 1
        ]);

        $this->post(route('admin-locales.store'), [
            'language' => 'Bulgarian',
            'code' => 'bg',
            'status' => 0,
            'add_to_url' => 0
        ])->assertSessionHasErrors([
            'language' => 'The language has already been taken.',
            'code' => 'The code has already been taken.',
        ]);
    }

    /** @test */
    public function group_form_validation()
    {
        $this->authenticate(null, 'admins');

        $this->post(route('admin-groups.store'), [
            'title' => '',
            'description' => 'testDescription',
            'status' => 3
        ])->assertSessionHasErrors([
            'title' => 'The title field is required.',
            'status' => 'The status must be between 0 and 1.',
        ]);

        $this->post(route('admin-groups.store'), [
            'title' => 'TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT',
            'description' => 'testDescription',
            'status' => 11
        ])->assertSessionHasErrors([
            'title' => 'The title may not be greater than 30 characters.',
            'status' => 'The status must be between 0 and 1.',
        ]);

        $this->post(route('admin-groups.store'), [
            'title' => 'TestTitle',
            'description' => 'testDescription',
            'status' => 1
        ]);

        $this->post(route('admin-groups.store'), [
            'title' => 'TestTitle',
            'description' => 'testDescription',
            'status' => 1
        ])->assertSessionHasErrors([
            'title' => 'The title has already been taken.',
        ]);

        $this->artisan('destroy:group TestTitle');
    }

    /** @test */
    public function route_group_form_validation()
    {
        $this->authenticate(null, 'admins');

        //$this->artisan('generate:route /test get TestController@test test.test');
        $this->post(route('admin-routes.store'), [
            'url' => '',
            'method' => '',
            'action' => '',
            'name' => '',
            'route_type' => '',
            'action_type' => ''
        ])->assertSessionHasErrors([
            'url' => 'The url field is required.',
            'method' => 'The method field is required.',
            'action' => 'The action field is required.',
            'name' => 'The name field is required.',
            'route_type' => 'The route type must be a string.',
            'action_type' => 'The action type must be a string.'

        ]);

        $this->post(route('admin-routes.store'), [
            'url' => 'test',
            'method' => 'test',
            'action' => 'test',
            'name' => 'test',
            'route_type' => 'test',
            'action_type' => 'test'
        ])->assertSessionHasErrors([
            'url' => 'The url format is invalid.',
            'method' => 'The method format is invalid.',
            'action' => 'The action format is invalid.',
            'route_type' => 'The route type format is invalid.',
            'action_type' => 'The action type format is invalid.'

        ]);

        $this->artisan('generate:route /test get TestController@test test.test');

        $this->post(route('admin-routes.store'), [
            'url' => '/test',
            'method' => 'get',
            'action' => 'TestController@test',
            'name' => 'test.test',
            'route_type' => 'web',
            'action_type' => 'front'
        ])->assertSessionHasErrors([
            'url' => 'The url has already been taken.',
            'name' => 'The name has already been taken.',
        ]);

        $this->artisan('destroy:route test.test');
    }
}
