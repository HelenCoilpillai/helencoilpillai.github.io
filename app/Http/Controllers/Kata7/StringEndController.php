<?php

namespace App\Http\Controllers\Kata7;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata7\StringEndRequest;
use App\Interfaces\RepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StringEndController extends Controller
{
    protected RepositoryInterface $stringEndRepository;

    /**
     * @param RepositoryInterface $stringEndRepository
     */
    public function __construct(RepositoryInterface $stringEndRepository)
    {
        $this->stringEndRepository = $stringEndRepository;
    }

    public function store(array $stringEndDetails): void
    {
        $this->stringEndRepository->create($stringEndDetails);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $stringEndResults = $this->stringEndRepository->getAll();
        return view('kata7/stringEnd/results', ['stringEndResults' => $stringEndResults]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $stringEndResults = $this->stringEndRepository->getById($id);
        return view('kata7/stringEnd/editForm', ['stringEndResults' => $stringEndResults]);
    }

    /**
     * @param StringEndRequest $updateDetailsRequest
     * @param int $id
     * @return Redirector|RedirectResponse
     */
    public function update(StringEndRequest $updateDetailsRequest, int $id): Redirector|RedirectResponse
    {
        $dbUpdateStatus = $this->stringEndRepository->update($id, $updateDetailsRequest);

        if ($dbUpdateStatus === true) {
            return $this->getRedirectObject('../../string-end-result-history')
                ->with('message', "The 'String End' values have been updated!");
        }
        return $this->getRedirectObject()
            ->back()
            ->with('message', 'No changes have been made');
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

        if (str_ends_with($stringEndDetails['text'], $stringEndDetails['text_ending']) === true) {
            $messageString = "The text matches the given text ending";
        } else {
            $messageString = "The text does not match the given text ending";
        }

        return $this->getRedirectObject()
            ->back()
            ->with('message', $messageString)
            ->with('specialMessage', "The 'String End' values have been saved!");
    }

    /**
     * @codeCoverageIgnore
     * @param $redirectPath
     * @return Redirector|RedirectResponse
     */
    protected function getRedirectObject($redirectPath = null): Redirector|RedirectResponse
    {
        return redirect($redirectPath);
    }
}
