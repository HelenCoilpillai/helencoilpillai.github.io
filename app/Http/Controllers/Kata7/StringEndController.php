<?php

namespace App\Http\Controllers\Kata7;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata7\StringEndRequest;
use App\Service\Kata7\StringEndService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StringEndController extends Controller
{
    /**
     * @var StringEndService
     */
    protected StringEndService $stringEndService;

    /**
     * @param StringEndService $stringEndService
     */
    public function __construct(StringEndService $stringEndService)
    {
        $this->stringEndService = $stringEndService;
    }

    /**
     * @param StringEndRequest $request
     * @return RedirectResponse
     */
    public function stringEndFormSubmit(StringEndRequest $request): RedirectResponse
    {
        $stringValue = $request->input('text');
        $stringEnd = $request->input('textEnding');
        $messageString = $this->stringEndService->checkIfStringMatchesTheGivenEnding($stringValue, $stringEnd);

        return $this->getRedirectObject()
            ->back()
            ->with('message', $messageString);

    }

    /**
     * @return Redirector
     * @codeCoverageIgnore
     */
    protected function getRedirectObject(): Redirector
    {
        return redirect();
    }

}
