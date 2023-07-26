<?php

namespace App\Livewire;

use App\Models\Candidate;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Sorteio extends Component
{
    public $winner = null;

    public function render(): View
    {
        return view('livewire.sorteio');
    }

    #[On('candidate::created')]
    public function run(): void
    {
        $winner = Candidate::query()->inRandomOrder()->first();

        $this->winner = $winner?->name;
    }
}
