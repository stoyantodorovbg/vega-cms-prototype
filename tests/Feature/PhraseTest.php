<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Phrase;
use Illuminate\Support\Facades\Cache;
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

    /** @test */
    public function phrase_helper_caches_the_phrase()
    {
        factory(Phrase::class)->create([
            'system_name' => 'example_phrase',
            'text' => [
                'en' => 'a phrase in English',
                'bg' => 'фраза на български',
            ]
        ]);

        app()->setLocale('bg');
        phrase('example_phrase');

        $this->assertTrue(Cache::has('phrase_' . app()->getLocale() . '_' . 'example_phrase'));
    }

    /** @test */
    public function phrase_helper_returns_the_accepted_phrase_key_if_there_is_no_such_phrase_in_the_cache_or_db()
    {
        Cache::forget('example_phrase');

        $result = phrase('example_phrase');

        $this->assertEquals($result, 'example_phrase');
    }
}
