<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReverseWordRequest;
use App\Service\Kata\ReverseWordService;
use Illuminate\Http\RedirectResponse;

class ReverseWordsController extends Controller
{

    /**
     * @var ReversewordService
     */
    protected $reverseWordService;


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
        return redirect()->back()->with('message', "This is the reversed text: {$reversedText}");
    }
}
