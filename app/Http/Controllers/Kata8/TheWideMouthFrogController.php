<?php

namespace App\Http\Controllers\Kata8;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kata8\TheWideMouthFrogRequest;
use App\Service\Kata8\TheWideMouthFrogService;

class TheWideMouthFrogController extends Controller
{
    public function animalNameFormSubmit(TheWideMouthFrogRequest $request)
    {
        $wideMouthFrogService = new TheWideMouthFrogService();

        $animalName = $request->input('animal');
        $mouthSize = $wideMouthFrogService->getMouthSize($animalName);
        return redirect()->back()->with('message', "The {$animalName}'s mouth is {$mouthSize}!");
    }
}
