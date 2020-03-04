<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Services\ValidationService;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Render Page data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($url)
    {
        if(resolve(ValidationService::class)->validate(['url' => $url], ['url'], 'page', 'access') === true &&
            $page = Page::where('url', $url)->where('status', 1)->first()
        ) {
            return view('front.page.renderer')->with([
                'pageData' => $page->getData(),
            ]);
        }

        abort(404);
    }
}
