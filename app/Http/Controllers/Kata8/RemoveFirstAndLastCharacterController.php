<?php

namespace App\Http\Controllers\Kata8;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata8\RemoveFirstAndLastCharacterRequest;
use App\Service\Kata8\RemoveFirstAndLastCharacterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RemoveFirstAndLastCharacterController extends Controller
{

    /**
     * @var RemoveFirstAndLastCharacterService
     */
    protected RemoveFirstAndLastCharacterService $removeFirstAndLastCharacterService;

    /**
     * @param RemoveFirstAndLastCharacterService $removeFirstAndLastCharacterService
     */
    public function __construct(RemoveFirstAndLastCharacterService $removeFirstAndLastCharacterService)
    {
        $this->removeFirstAndLastCharacterService = $removeFirstAndLastCharacterService;
    }

    /**
     * @param RemoveFirstAndLastCharacterRequest $request
     * @return RedirectResponse
     */
    public function removeFirstAndLastCharacterFormSubmit(RemoveFirstAndLastCharacterRequest $request): RedirectResponse
    {
        $inputString = $request->input('input');

        $firstAndLastCharacterRemovedString = $this->removeFirstAndLastCharacterService->removeFirstAndLastCharacter($inputString);

        return $this->getRedirectObject()
            ->back()
            ->with('message', "The first & last characters have been removed: {$firstAndLastCharacterRemovedString}");
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
