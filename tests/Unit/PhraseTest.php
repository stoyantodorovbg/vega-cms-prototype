<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Phrase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhraseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_phrase_has_translated_text(): void
    {
        factory(Phrase::class)->create([
            'text' => [
                'en' => 'a phrase in English',
                'bg' => 'фраза на български',
            ]
        ]);

        $phrase = Phrase::first();

        $this->assertEquals($phrase->translations['text']['en'], 'a phrase in English');
        $this->assertEquals($phrase->translations['text']['bg'], 'фраза на български');
    }

    /** @test */
    public function the_phrase_is_compliant_with_site_locale(): void
    {
        factory(Phrase::class)->create([
            'text' => [
                'en' => 'a phrase in English',
                'bg' => 'фраза на български',
            ]
        ]);

        $phrase = Phrase::first();

        app()->setLocale('en');
        $this->assertEquals($phrase->text, 'a phrase in English');

        app()->setLocale('bg');
        $this->assertEquals($phrase->text, 'фраза на български');
    }

    /** @test */
    public function the_phrase_gives_translation_for_default_locale_when_have_not_translation_for_the_app_locale(): void
    {
        factory(Phrase::class)->create([
            'text' => [
                'en' => 'a phrase in English',
                'bg' => 'фраза на български',
            ]
        ]);

        $phrase = Phrase::first();

        app()->setLocale('de');
        $this->assertEquals($phrase->text, 'a phrase in English');
    }
}
