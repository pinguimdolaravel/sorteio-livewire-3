<x-app-layout>
    <div class="text-center text-3xl text-slate-300 font-bold font-mono underline">
        https://sorteio.dolaravel.com/
    </div>
    <div class="text-center text-3xl mt-4 text-slate-300 font-bold">
        🐧 Sorteio para 10K 🐧
    </div>
    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-white">
                <livewire:sorteio lazy />
            </div>
        </div>
    </div>
</x-app-layout>
