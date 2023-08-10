<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    #[Url(as: 'q', history: true, keep: true)]
    public ?string $search = '';

    public function render()
    {
        return view('livewire.candidate.search');
    }

    #[Computed]
    public function candidates(): Collection
    {
        return Candidate::all();
    }
}
