@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            👨‍💻 Desenvolvedores
        </h1>

        <a href="{{ route('desenvolvedores.create') }}" class="bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-lg">
            Novo Desenvolvedor
        </a>

    </div>

    <div class="card rounded-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-purple-900">

                <tr>
                    <th class="p-4">ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Experiência</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                @foreach($desenvolvedores as $dev)

                    <tr class="border-b border-gray-800 hover:bg-purple-900/50 transition-colors duration-200">

                        <td class="p-4">{{ $dev->id }}</td>

                        <td>{{ $dev->nome }}</td>

                        <td>{{ $dev->especialidade }}</td>

                        <td>{{ $dev->experiencia }} anos</td>

                        <td class="space-x-3">

                            <a href="{{ route('desenvolvedores.edit', $dev->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg inline-block">
                                Editar
                            </a>

                            <form action="{{ route('desenvolvedores.destroy', $dev->id) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
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