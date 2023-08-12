<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-y-8">
            <h1 class="dark:text-white text-center">
                <span class="font-mono font-bold text-red-600">{{ auth()->user()->github_user }}</span>, obrigado por se registrar no sorteio do Pinguim do Laravel!!
            </h1>
        </div>
    </div>
</x-app-layout>
