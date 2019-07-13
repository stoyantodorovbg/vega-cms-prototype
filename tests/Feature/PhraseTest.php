<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Phrase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhraseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_phrase_text_can_be_fetched_via_helper(): void
    {
        factory(Phrase::class)->create([
            'system_name' => 'example_phrase',
            'text' => [
                'en' => 'a phrase in English',
                'bg' => 'фраза на български',
            ]
        ]);

        $phraseText = phrase('example_phrase');

        $this->assertEquals($phraseText, 'a phrase in English');

        app()->setLocale('bg');
        $phraseText = phrase('example_phrase');

        $this->assertEquals($phraseText, 'фраза на български');
    }
}
