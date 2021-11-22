<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheWideMouthFrogRequest;
use App\Service\kata\TheWideMouthFrogService;

class TheWideMouthFrogController extends Controller
{
    public function animalNameFormSubmit(TheWideMouthFrogRequest $request)
    {
        $animal = new TheWideMouthFrogService();

        $animalName = $request->input('animal');
        $mouthSize = $animal->getMouthSize($animalName);
        return redirect()->back()->with('message', "The {$animalName}s mouth is {$mouthSize}!");
    }
}
