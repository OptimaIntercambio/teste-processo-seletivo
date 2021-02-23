<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Idiomas') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <article class="p-4 bg-white border-b border-gray-200">
                    <header class="main-header">
                        <nav id="header-buttons">
                            <a class="btn primary-button" href="{{ route('admin.idiomas.create') }}">Novo Idioma</a>
                        </nav>
                    </header>

                    <main>
                        <table class="app-table table text-center">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%">ID</th>
                                    <th scope="col" style="width: 65%">Nome</th>
                                    <th scope="col" style="width: 20%">Número de Falantes</th>
                                    <th scope="col" style="width: 10%">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($idiomas as $idioma)
                                    <tr>
                                        <th scope="row">{{ $idioma->id }}</th>
                                        <td>
                                            <a href="{{ route('admin.idiomas.edit', $idioma->id)}}">{{ $idioma->nome }}</a>
                                        </td>
                                        <td>{{ $idioma->num_falantes }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn primary-button dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.idiomas.edit', $idioma->id)}}">Editar</a>
                                                    <form class="dropdown-item" method="POST" action="{{ route('admin.idiomas.destroy', $idioma->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger btn-link">Excluir</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
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
