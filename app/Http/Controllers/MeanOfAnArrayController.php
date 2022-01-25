<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeanOfAnArrayRequest;
use App\Service\Kata\MeanOfAnArrayService;
use Illuminate\Http\Request;

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
