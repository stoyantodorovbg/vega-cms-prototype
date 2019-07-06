<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\LocaleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Services\Interfaces\LocaleServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;

class LocalesController extends Controller
{
    /**
     * Set a site locale
     *
     * @param LocaleRequest $localeRequest
     * @param LocaleServiceInterface $localeService
     * @param MessageServiceInterface $messageService
     * @return JsonResponse
     */
    public function setLocale(
        LocaleRequest $localeRequest,
        LocaleServiceInterface $localeService,
        MessageServiceInterface $messageService
    ): JsonResponse {

        // This data will be fetched from DB
        $success = [
            'message' => 'The site locale is changed successfully.',
            'status' => 200
        ];

        $failure = [
            'message' => 'This site locale has been already selected!',
            'status' => 302
        ];

        $result = $messageService->checkResult(
            $localeService->setSelectedLocale($localeRequest->code),
            $success,
            $failure
        );

        return Response::json($result['message'], $result['status']);
    }
}
