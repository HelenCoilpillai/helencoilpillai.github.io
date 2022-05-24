<?php

namespace App\Http\Controllers\Kata7;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata7\StringEndRequest;
use App\Interfaces\CrudRepositoryInterface;
use App\Service\Kata7\StringEndService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Resources\views;


class StringEndController extends Controller
{
    protected StringEndService $stringEndService;
    protected CrudRepositoryInterface $stringEndRepository;

    /**
     * @param StringEndService $stringEndService
     * @param CrudRepositoryInterface $stringEndRepository
     */
    public function __construct(StringEndService $stringEndService, CrudRepositoryInterface $stringEndRepository)
    {
        $this->stringEndService = $stringEndService;
        $this->stringEndRepository = $stringEndRepository;
    }

    /**
     * @param array $stringEndDetails
     * @return void
     */
    public function store(array $stringEndDetails): void
    {
        $this->stringEndRepository->create($stringEndDetails);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $stringEndResults = $this->stringEndRepository->getAll();
        return view('kata7/historyResults/stringEndResults', ['stringEndResults' => $stringEndResults]);
    }

    /**
     * @param StringEndRequest $request
     * @return RedirectResponse
     */
    public function stringEndFormSubmit(StringEndRequest $request): RedirectResponse
    {
        $stringEndDetails = $request->only([
            'text',
            'text_ending'
        ]);

        $this->store($stringEndDetails);
        $stringValue = $stringEndDetails['text'];
        $stringEnd = $stringEndDetails['text_ending'];
        $messageString = $this->stringEndService->checkIfStringMatchesTheGivenEnding($stringValue, $stringEnd);

        return $this->getRedirectObject()
            ->back()
            ->with('message', $messageString)
            ->with('specialMessage', "The input values have been saved!");
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
