<?php

namespace App\Http\Controllers\Kata8;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata8\MeanOfAnArrayRequest;
use App\Service\Kata8\MeanOfAnArrayService;

class MeanOfAnArrayController extends Controller
{
    public function meanOfAnArrayFormSubmit(MeanOfAnArrayRequest $request)
    {
        $calculateMeanOfArrayService = new MeanOfAnArrayService();

        $marksArray = explode(',', trim($request->input('marks'), ','));
        $meanOfMarks = $calculateMeanOfArrayService->calculateMeanOfMarks($marksArray);
        return redirect()->back()->with('message', "Your average Mark is {$meanOfMarks}!");
    }
}
