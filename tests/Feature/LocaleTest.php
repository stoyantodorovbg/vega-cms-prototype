<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Locale;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_selected_locale_can_be_changed_via_http_request(): void
    {
        app()->setLocale('en');

        factory(Locale::class)->create([
            'code' => 'bg',
        ]);

        $this->post(route('locales.set-locale'), ['code' => 'bg'])
        ->assertStatus(200);

        $this->assertEquals('bg', app()->getLocale());
    }

    /** @test */
    public function the_selected_locale_is_set_in_the_session(): void
    {
        factory(Locale::class)->create([
            'code' => 'bg',
        ]);

        $this->post(route('locales.set-locale'), ['code' => 'bg'])
            ->assertStatus(200)
            ->assertSessionHas('locale', 'bg');
    }

//    /** @test */
//    public function the_selected_locale_have_exists_in_database(): void
//    {
//        $this->post(route('locales.set-locale'), ['code' => 'bg'])
//            ->assertStatus(422);
//    }
}
