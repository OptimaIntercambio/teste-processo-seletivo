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

                    <main>
                        <table class="app-table table text-center">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%">ID</th>
                                    <th scope="col" style="width: 20%">Nome</th>
                                    <th scope="col" style="width: 20%">Imagem</th>
                                    <th scope="col" style="width: 55%">Resumo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
                                        <th scope="row">{{ $pais->id }}</th>
                                        <td>{{ $pais->nome }}</td>
                                        <td>{{ $pais->imagem }}</td>
                                        <td class="text-justify">{{ $pais->resumo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </article>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

    </script>
</x-app-layout>
