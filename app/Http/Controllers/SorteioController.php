<?php

namespace App\Http\Controllers;

class SorteioController extends Controller
{
    public function __invoke()
    {
        abort_unless(auth()->id() == 1, 403);

        return view('sorteio');
    }
}
