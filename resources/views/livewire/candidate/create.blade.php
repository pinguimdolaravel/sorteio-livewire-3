<div>

    <form wire:submit="save">

        <div>
            <x-input-label>Name</x-input-label>
            <x-text-input name="name" wire:model.lazy="form.name"/>
            @error('form.name')
                <div class="text-red-100 font-bold text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-input-label>Email</x-input-label>
            <x-text-input name="email" wire:model.live="form.email"/>
            @error('form.email')
            <div class="text-red-100 font-bold text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-input-label>Github</x-input-label>
            <x-text-input name="github" wire:model="form.github"/>
            @error('form.github')
            <div class="text-red-100 font-bold text-sm">{{ $message }}</div>
            @enderror
        </div>

        <x-primary-button type="submit">
            Save
        </x-primary-button>

    </form>


</div>
