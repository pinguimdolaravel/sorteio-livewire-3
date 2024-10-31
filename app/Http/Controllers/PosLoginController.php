<?php

namespace App\Http\Controllers;

class PosLoginController extends Controller
{
    public function __invoke()
    {
        if(auth()->id == 1) {
            return to_route('sorteio');
        }

        return view('blz');
    }
}
