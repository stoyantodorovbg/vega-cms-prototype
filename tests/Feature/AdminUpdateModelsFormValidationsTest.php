<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Phrase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUpdateModelsFormValidationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_form_validation()
    {
        $this->authenticate(null, 'admins');

        $user = factory(User::class)->create([
            'email' => 'test@email.com',
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ])->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
            'password' => 'The password field is required.'
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => 'ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt',
            'email' => 'test@email.com',
            'password' => '333333333',
            'password_confirmation' => '4444444444'
        ])->assertSessionHasErrors([
            'name' => 'The name may not be greater than 30 characters.',
            'password' => 'The password confirmation does not match.'
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => 'test',
            'email' => 'test',
            'password' => '3333333333',
            'password_confirmation' => '33333333333'
        ])->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.',
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => 'test',
            'email' => 'test1@email.com',
            'password' => '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111',
        ])->assertSessionHasErrors([
            'password' => 'The password may not be greater than 50 characters.'
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => 'test',
            'email' => 'test1@email.com',
            'password' => 'test',
            'password_confirmation' => 'test'
        ])->assertSessionHasErrors([
            'password' => 'The password must be at least 5 characters.'
        ]);

        $this->patch(route('admin-users.update', $user->getSlug()), [
            'name' => 'test',
            'email' => 'test1@email.com',
            'password' => 'testpass',
            'password_confirmation' => 'testpass'
        ])->assertSessionHasNoErrors();
    }

    /** @test */
    public function phrase_form_validation()
    {
        $this->authenticate(null, 'admins');

        $phrase = factory(Phrase::class)->create([
            'system_name' => 'test',
            'text' => ['en' => 'test']
        ]);

        $this->patch(route('admin-phrases.update', $phrase->getSlug()), [
            'system_name' => '',
        ])->assertSessionHasErrors([
            'system_name' => 'The system name field is required.',
            'text' => 'The text field is required.'
        ]);

        $this->patch(route('admin-phrases.update', $phrase->getSlug()), [
            'system_name' => 'test',
            'text' => 'www'
        ])->assertSessionHasErrors([
            'text' => 'The text must be an array.'
        ]);

        $this->patch(route('admin-phrases.update', $phrase->getSlug()), [
            'system_name' => 'test',
            'text' => ['bg' => 'test1']
        ])->assertSessionHasNoErrors();
    }

//    /** @test */
//    public function group_form_validation()
//    {
//        $this->authenticate(null, 'admins');
//
//        $this->artisan('generate:group testTitle --description=description');
//
//        $route = Group::where('title', 'testTitle')->first();
//        $this->patch(route('admin-groups.update', $route->getSlug()), [
//            'description' => '',
//            'status' => 3
//        ])->assertSessionHasErrors([
//            'description' => 'The description must be a string.',
//            'status' => 'The status must be between 0 and 1.',
//        ]);
//
//        $this->artisan('destroy:group testTitle');
//    }
}
