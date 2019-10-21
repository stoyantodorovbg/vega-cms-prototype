<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPhraseRequest;
use App\Models\Phrase;

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
     * Admin phrases create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.phrases.create');
    }

    /**
     * Admin phrases store action
     *
     * @param AdminPhraseRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AdminPhraseRequest $request)
    {
        $phrase = Phrase::create($request->validated());

        return redirect()->route('admin-phrases.edit', compact('phrase'));
    }

    /**
     * Admin phrases edit page
     *
     * @param Phrase $phrase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Phrase $phrase)
    {
        return view('admin.phrases.edit');
    }

    /**
     * Admin phrases update action
     *
     * @param Phrase $phrase
     * @param AdminPhraseRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Phrase $phrase, AdminPhraseRequest $request)
    {
        return redirect()->back();
    }
}
