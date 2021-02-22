<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Câmbio de Moeda | {$moeda->codigo}-BRL") }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <article class="grid-two-columns p-4 bg-white border-b border-gray-200">
                    @foreach ($moeda->cambio()->get() as $cambio)
                        <ul class="list-group">
                            <p class="lead text-center"><strong class="font-weight-bold">Data de Atualização:</strong> {{ $cambio->verified_date->format('d/m/Y - H:m:s') }}</p>
                            <li class="list-group-item"><strong>Alta:</strong> {{ $cambio->high }}</li>
                            <li class="list-group-item"><strong>Baixa:</strong> {{ $cambio->low }}</li>
                            <li class="list-group-item"><strong>Preços de Compra:</strong> {{ $cambio->bid }}</li>
                            <li class="list-group-item"><strong>Preços de Venda:</strong> {{ $cambio->ask }}</li>
                            <li class="list-group-item"><strong>Porcentagem de Variação:</strong>
                                {{ $cambio->pctChange }}</li>
                        </ul>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
</x-app-layout>
