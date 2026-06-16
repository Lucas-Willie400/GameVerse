@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            🏆 Torneios
        </h1>

        <a href="{{ route('torneios.create') }}" class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-lg">
            Novo Torneio
        </a>

    </div>

    <div class="card rounded-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-purple-900">

                <tr>
                    <th class="p-4">ID</th>
                    <th>Título</th>
                    <th>Prêmio</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                @foreach($torneios as $torneio)

                    <tr class="border-b border-gray-800 hover:bg-purple-900/50 transition-colors duration-200">

                        <td class="p-4">{{ $torneio->id }}</td>

                        <td>{{ $torneio->titulo }}</td>

                        <td>R$ {{ number_format($torneio->premio, 2, ',', '.') }}</td>

                        <td>{{ $torneio->data_evento }}</td>

                        <td class="space-x-3">

                            <a href="{{ route('torneios.edit', $torneio->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg inline-block">
                                Editar
                            </a>

                            <form action="{{ route('torneios.destroy', $torneio->id) }}" method="POST"
                                class="inline-block ml-3">


                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 px-3 py-1 rounded">
                                    Excluir
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection