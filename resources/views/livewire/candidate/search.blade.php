<div class="text-white">
    <div>
        <x-text-input name="search" wire:model.live="search" />
    </div>

    <div class="text-blue-300">{{ $search }}</div>
    @foreach($this->candidates as $candidate)
        <div>
            {{ $candidate->name }}
        </div>
    @endforeach
</div>
