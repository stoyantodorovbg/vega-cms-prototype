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


    }
}
