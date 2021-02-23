<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Editar | {$idioma->nome}") }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <article class="p-4 bg-white border-b border-gray-200">
                    <p id="page-description" class="lead">Atualize abaixo as informações do idioma selecionado:</p>
                    @include('admin.idiomas._partials.form', ['method' => 'PUT', 'action' => route('admin.idiomas.update', $idioma->id)])
                </article>
            </div>
        </div>
    </div>
</x-app-layout>
