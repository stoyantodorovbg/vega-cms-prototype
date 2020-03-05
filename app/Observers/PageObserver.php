<?php

namespace App\Observers;

use App\Models\Page;
use Illuminate\Validation\ValidationException;
use App\Services\Interfaces\ValidationServiceInterface;

class PageObserver
{
    /**
     * Handle the page "creating" event
     *
     * @param Page $page
     * @throws ValidationException
     */
    public function creating(Page $page)
    {
        $validation = resolve(ValidationServiceInterface::class)
            ->validate(['url' => $page->url], ['url'], 'page', 'create');
        if($validation !== true) {
            throw ValidationException::withMessages($validation);
        }
    }
}
