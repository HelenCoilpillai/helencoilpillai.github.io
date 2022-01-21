<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheWideMouthFrogRequest;
use App\Service\Kata\TheWideMouthFrogService;

class TheWideMouthFrogController extends Controller
{
    public function animalNameFormSubmit(TheWideMouthFrogRequest $request)
    {
        $wideMouthFrogService = new TheWideMouthFrogService();

        $animalName = $request->input('animal');
        $mouthSize = $wideMouthFrogService->getMouthSize($animalName);
        return redirect()->back()->with('message', "The {$animalName}'s mouth is {$mouthSize}!");

//        return response()->json([
//            "message" => "The {$animalName}'s mouth is {$mouthSize}!"
//        ], 200);

    }
}
