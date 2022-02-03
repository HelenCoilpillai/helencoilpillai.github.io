<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReverseWordRequest;
use App\Service\Kata\ReverseWordService;

class ReverseWordsController extends Controller
{
    public function reverseWordsFormSubmit(ReverseWordRequest $request)
    {
        $reversedWordService = new ReverseWordService();

        $textToBeReversed = $request->input('reverseWordsText');
        $reversedText = $reversedWordService->reverseWords($textToBeReversed);
        return redirect()->back()->with('message', "This is the reversed text: {$reversedText}");
    }
}
