<?php

use App\Models\Phrase;
use Illuminate\Database\Seeder;

class PhrasesButtonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phrase::create([
            'system_name' => 'buttons.edit_menu',
            'text' => [
                'en' => 'edit menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show_menu',
            'text' => [
                'en' => 'show menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all_menus',
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
            'system_name' => 'buttons.edit_menu_item',
            'text' => [
                'en' => 'edit menu item'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show_menu_item',
            'text' => [
                'en' => 'show menu item'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-child-menu-items',
            'text' => [
                'en' => 'show child menu items'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.menu_show',
            'text' => [
                'en' => 'show menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.menu_edit',
            'text' => [
                'en' => 'edit menu'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.parent_menu_item_menu_show',
            'text' => [
                'en' => 'parent menu item show'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.parent_menu_item_edit_menu_edit',
            'text' => [
                'en' => 'parent menu item edit'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-routes',
            'text' => [
                'en' => 'all routes'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show_child_menu_items',
            'text' => [
                'en' => 'show child menu items'
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
            'system_name' => 'buttons.show-page',
            'text' => [
                'en' => 'show page'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all-pages',
            'text' => [
                'en' => 'all pages'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show-page-containers',
            'text' => [
                'en' => 'show page containers'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit_page',
            'text' => [
                'en' => 'edit page'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all_pages',
            'text' => [
                'en' => 'all pages'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show_child_containers',
            'text' => [
                'en' => 'show child containers'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.edit_container',
            'text' => [
                'en' => 'edit container'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.all_containers',
            'text' => [
                'en' => 'all containers'
            ]
        ]);

        Phrase::create([
            'system_name' => 'buttons.show_container',
            'text' => [
                'en' => 'show container'
            ]
        ]);
    }
}
