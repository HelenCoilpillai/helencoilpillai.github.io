<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StringRepeatRequest;
use App\Service\Kata\StringRepeatService;

class StringRepeatController extends Controller
{
    /**
     * @var StringRepeatService
     */
    protected StringRepeatService $stringRepeatService;

    /**
     * @param StringRepeatService $stringRepeatService
     */
    public function __construct(StringRepeatService $stringRepeatService)
    {

        $this->stringRepeatService = $stringRepeatService;

    }

    /**
     * @param StringRepeatRequest $request
     * @return RedirectResponse
     */
    public function stringRepeatFormSubmit(StringRepeatRequest $request): RedirectResponse
    {
        $textToRepeat = $request->input('textToRepeat');
        $repeatTimes = $request->input('repeatTimes');

        $repeatedString = $this->stringRepeatService->repeatString($textToRepeat, $repeatTimes);
        $formattedRepeatedString = "Repeated text:" . wordwrap($repeatedString, 100, "<br>", true);

        return redirect()
            ->back()
            ->with("specialMessage", $formattedRepeatedString);

    }
}
