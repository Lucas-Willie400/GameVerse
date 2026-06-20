@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            🎮 Jogos
        </h1>

        <a href="{{ route('jogos.create') }}" class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-lg">
            Novo Jogo
        </a>

    </div>

    <div class="card rounded-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-purple-900">

                <tr>
                    <th class="p-4">ID</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                @foreach($jogos as $jogo)

                    <tr class="border-b border-gray-800 hover:bg-purple-900/20 transition-colors duration-200">

                        <td class="p-4">{{ $jogo->id }}</td>

                        <td>{{ $jogo->nome }}</td>

                        <td>{{ $jogo->genero }}</td>

                        <td>R$ {{ number_format($jogo->preco, 2, ',', '.') }}</td>

                        <td class="space-x-3">

                            <a href="{{ route('jogos.edit', $jogo->id) }}"
                                class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg inline-block">
                                Editar
                            </a>

                            <form action="{{ route('jogos.destroy', $jogo->id) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-lg">
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