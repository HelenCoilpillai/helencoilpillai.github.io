<?php

namespace App\Http\Controllers\Kata8;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata8\StringRepeatRequest;
use App\Service\Kata8\StringRepeatService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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
        $formattedRepeatedString = "Repeated text: " . wordwrap($repeatedString, 100, "<br>", true);

        return $this->getRedirectObject()
            ->back()
            ->with("specialMessage", $formattedRepeatedString);

    }

    /**
     * @codeCoverageIgnore
     * @return Redirector
     */
    protected function getRedirectObject(): Redirector
    {
        return redirect();
    }
}
