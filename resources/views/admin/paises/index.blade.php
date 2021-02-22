<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Países') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <article class="p-4 bg-white border-b border-gray-200">
                    <header class="main-header">
                        <nav id="header-buttons">
                            <a class="btn primary-button" href="{{ route('paises.create') }}">Novo País</a>
                        </nav>
                    </header>
                    Olá! Aqui temos uma lista de países!
                </article>
            </div>
        </div>
    </div>
</x-app-layout>
