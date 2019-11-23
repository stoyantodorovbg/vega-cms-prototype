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
            'text' => ['en' => '']
        ])->assertSessionHasErrors([
            'system_name' => 'The system name field is required.',
            'text.en' => 'The text.en field is required.'
        ]);

        $this->post(route('admin-phrases.store'), [
            'system_name' => 'test',
            'text' => ['bg' => '']
        ])->assertSessionHasErrors([
            'text.bg' => 'The text.bg field is required.'
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
}
