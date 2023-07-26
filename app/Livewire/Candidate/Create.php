<?php

namespace App\Livewire\Candidate;

use App\Livewire\Forms\CandidateCreateForm;
use App\Models\Candidate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Form;

class Create extends Component
{
    public CandidateCreateForm $form;

    public function render(): View
    {
        return view('livewire.candidate.create');
    }

    public function save(): void
    {
        $this->validate();

        $this->form->save();

        $this->dispatch('candidate::created');
    }
}
