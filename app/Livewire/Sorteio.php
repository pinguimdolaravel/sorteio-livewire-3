<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Sorteio extends Component
{
    public $winner = null;

    public function mount()
    {
        sleep(1);
    }

    public function placeholder(): string
    {
        return <<<'html'
            <div class="text-white bg-pink-500 font-bold rounder p-5 text-center">
                Carregando jetete!!!!!
            </div>
        html;
    }

    public function render(): View
    {
        return view('livewire.sorteio', [
            'winners' => Winner::query()->get(),
        ]);
    }

    #[On('candidate::created')]
    public function run(): void
    {
        $candidates = User::query()
            ->where('github_user', '!=', 'r2luna')
            ->whereNotIn('github_user', Winner::all()->pluck('github_user'))
            ->inRandomOrder()
            ->get();

        foreach ($candidates as $candidate) {
            $this->stream('winner', $candidate->name, true);
            usleep(7000);
        }

        $winner = User::query()
            ->where('github_user', '!=', 'r2luna')
            ->whereNotIn('github_user', Winner::all()->pluck('github_user'))
            ->inRandomOrder()
            ->first();

        Winner::create([
            'github_user' => $winner->github_user,
        ]);

        $this->winner = $winner?->name;

        $this->js('confetti()');
    }
}
