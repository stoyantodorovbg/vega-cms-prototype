<?php

namespace App\Http\Controllers\Admin;

use App\Models\Locale;
use App\Models\Phrase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPhraseRequest;

class PhrasesController extends Controller
{
    /**
     * Admin phrases index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.phrases.index');
    }

    /**
     * Admin phrases show page
     *
     * @param Phrase $phrase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Phrase $phrase)
    {
        $phraseTranslations = $phrase->getTranslations('text');
        unset($phraseTranslations['structure']);

        return view('admin.phrases.show', compact('phrase', 'phraseTranslations'));
    }

    /**
     * Admin phrases create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $activeLocales = Locale::where('status', 1)->get();

        return view('admin.phrases.create', compact('activeLocales'));
    }

    /**
     * Admin phrases store action
     *
     * @param AdminPhraseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminPhraseRequest $request)
    {
        $phrase = Phrase::create($request->validated());

        return redirect()->route('admin-phrases.show', $phrase->getSlug())->with(compact('phrase'));
    }

    /**
     * Admin phrases edit page
     *
     * @param Phrase $phrase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Phrase $phrase)
    {
        $activeLocales = Locale::where('status', 1)->get();
        $phraseTranslations = $phrase->getTranslations('text');

        return view('admin.phrases.edit', compact('phrase', 'activeLocales', 'phraseTranslations'));
    }

    /**
     * Admin phrases update action
     *
     * @param Phrase $phrase
     * @param AdminPhraseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Phrase $phrase, AdminPhraseRequest $request)
    {
        $phrase->update($request->validated());

        return redirect()->back()->with(compact('phrase'));
    }
}
