<?php

namespace App\Http\Controllers\Kata8;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata8\ReverseWordRequest;
use App\Service\Kata8\ReverseWordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ReverseWordsController extends Controller
{

    /**
     * @var ReverseWordService
     */
    protected ReverseWordService $reverseWordService;

    /**
     * @param ReverseWordService $reverseWordService
     */
    public function __construct(ReverseWordService $reverseWordService)
    {
        $this->reverseWordService = $reverseWordService;
    }

    /**
     * @param ReverseWordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reverseWordsFormSubmit(ReverseWordRequest $request): RedirectResponse
    {
        $textToBeReversed = $request->input('reverseWordsText');
        $reversedText = $this->reverseWordService->reverseWords($textToBeReversed);

        return $this->getRedirectObject()
            ->back()
            ->with('message', "This is the reversed text: {$reversedText}");
    }

    /**
     * @codeCoverageIgnore
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function getRedirectObject(): Redirector
    {
        return redirect();
    }
}
