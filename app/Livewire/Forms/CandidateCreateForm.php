<?php

namespace App\Livewire\Forms;

use App\Models\Candidate;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CandidateCreateForm extends Form
{
    #[Rule(['required', 'min:3'])]
    public ?string $name;

    #[Rule(['required', 'email'])]
    public ?string $email;

    public ?string $github;

    public function save(): void
    {
        Candidate::query()
            ->create($this->all());
    }
}
