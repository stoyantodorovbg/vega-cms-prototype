<?php

use App\Models\Phrase;
use Illuminate\Database\Seeder;

class PhrasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Labels
        Phrase::create([
            'system_name' => 'labels.id',
            'text' => [
                'en' => 'ID'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.field_name',
            'text' => [
                'en' => 'field name'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.value',
            'text' => [
                'en' => 'value'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.name',
            'text' => [
                'en' => 'name'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.email',
            'text' => [
                'en' => 'email'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.email_verified_at',
            'text' => [
                'en' => 'email verified at'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.created_at',
            'text' => [
                'en' => 'created at'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.updated_at',
            'text' => [
                'en' => 'updated at'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.language',
            'text' => [
                'en' => 'language'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.code',
            'text' => [
                'en' => 'code'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.status',
            'text' => [
                'en' => 'status'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.add_to_url',
            'text' => [
                'en' => 'add to url'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.url',
            'text' => [
                'en' => 'url'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.method',
            'text' => [
                'en' => 'method'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.action',
            'text' => [
                'en' => 'action'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.route_type',
            'text' => [
                'en' => 'route type'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.system_name',
            'text' => [
                'en' => 'system name'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.text',
            'text' => [
                'en' => 'text'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.title',
            'text' => [
                'en' => 'title'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.description',
            'text' => [
                'en' => 'description'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-routes',
            'text' => [
                'en' => 'all routes'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-route',
            'text' => [
                'en' => 'edit route'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-route',
            'text' => [
                'en' => 'show route'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-user-groups',
            'text' => [
                'en' => 'all user groups'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-user-group',
            'text' => [
                'en' => 'edit user group'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-user-group',
            'text' => [
                'en' => 'show user group'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-locales',
            'text' => [
                'en' => 'all locales'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-locale',
            'text' => [
                'en' => 'edit locale'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-locale',
            'text' => [
                'en' => 'show locale'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-phrases',
            'text' => [
                'en' => 'all phrases'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-phrase',
            'text' => [
                'en' => 'edit phrase'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-phrase',
            'text' => [
                'en' => 'show phrase'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-users',
            'text' => [
                'en' => 'all users'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-user',
            'text' => [
                'en' => 'edit user'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-user',
            'text' => [
                'en' => 'show user'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.submit',
            'text' => [
                'en' => 'submit'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.choose_status',
            'text' => [
                'en' => 'choose status'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.active',
            'text' => [
                'en' => 'active'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.inactive',
            'text' => [
                'en' => 'inactive'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.confirm_password',
            'text' => [
                'en' => 'confirm password'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.password',
            'text' => [
                'en' => 'password'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.choose_one',
            'text' => [
                'en' => 'choose one'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.yes',
            'text' => [
                'en' => 'yes'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.no',
            'text' => [
                'en' => 'no'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.action_type',
            'text' => [
                'en' => 'action type'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.choose_route_type',
            'text' => [
                'en' => 'choose route type'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.choose_action_type',
            'text' => [
                'en' => 'choose action type'
            ]
        ]);
        Phrase::create([
            'system_name' => 'messages.deleted',
            'text' => [
                'en' => 'deleted!'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.password_confirmation',
            'text' => [
                'en' => 'password confirmation'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.route_groups',
            'text' => [
                'en' => 'route groups'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.classes',
            'text' => [
                'en' => 'classes'
            ]
        ]);

        Phrase::create([
            'system_name' => 'labels.styles',
            'text' => [
                'en' => 'styles'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-menu',
            'text' => [
                'en' => 'edit menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-menu',
            'text' => [
                'en' => 'show menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-menus',
            'text' => [
                'en' => 'all menus'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.menu',
            'text' => [
                'en' => 'menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit-menu-item',
            'text' => [
                'en' => 'edit menu item'
            ]
        ]);
    }
}
