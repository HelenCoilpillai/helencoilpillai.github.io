<?php

namespace App\Http\Controllers;

use App\Http\Requests\RemoveFirstAndLastCharacterRequest;
use App\Service\Kata\RemoveFirstAndLastCharacterService;
use Illuminate\Http\RedirectResponse;
use phpDocumentor\Reflection\Types\Null_;

class RemoveFirstAndLastCharacterController extends Controller
{

    protected $removeFirstAndLastCharacterService;

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
        return redirect()->back()
            ->with('message', "The first & last characters have been removed: {$firstAndLastCharacterRemovedString}");
    }
}
