<?php

namespace App\Http\Controllers\Kata7;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata7\HighestAndLowestNumbersRequest;
use App\Service\Kata7\HighestAndLowestNumbersService;
use Illuminate\Http\RedirectResponse;


class HighestAndLowestNumbersController extends Controller
{
    /**
     * @var HighestAndLowestNumbersService
     */
    protected HighestAndLowestNumbersService $highestAndLowestNumbersService;

    /**
     * @param HighestAndLowestNumbersService $highestAndLowestNumbersService
     */
    public function __construct(HighestAndLowestNumbersService $highestAndLowestNumbersService)
    {
        $this->highestAndLowestNumbersService = $highestAndLowestNumbersService;
    }

    /**
     * @param HighestAndLowestNumbersRequest $request
     * @return RedirectResponse
     */
    public function highestAndLowestNumbersFormSubmit(HighestAndLowestNumbersRequest $request): RedirectResponse
    {
        $numbers = $request->input('numbers');
        $minAndMaxNumbers = $this->highestAndLowestNumbersService->findHighestAndLowestNumbers($numbers);
        return redirect()
            ->back()
            ->with('message', "{$minAndMaxNumbers}");
    }
}
