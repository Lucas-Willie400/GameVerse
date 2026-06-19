@extends('layouts.app')

@section('content')

    <div class="glass rounded-2xl overflow-hidden p-8">

        <h2 class="text-3xl font-bold mb-6">
            Novo Jogo
        </h2>

        <form action="{{ route('jogos.store') }}" method="POST">

            @csrf

            <div class="grid md:grid-cols-3 gap-4">

                <input type="text" name="nome" placeholder="Nome do jogo" class="bg-slate-900 p-3 rounded text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600" required>

                <select name="genero" class="bg-slate-900 p-3 rounded text-white focus:outline-none focus:ring-2 focus:ring-purple-600 cursor-pointer" required>
                    <option value="" disabled selected hidden>Gênero</option>
                    <option value="Aventura" class="bg-slate-900">Aventura</option>
                    <option value="RPG" class="bg-slate-900">RPG</option>
                    <option value="RPG de Mundo Aberto" class="bg-slate-900">RPG de Mundo Aberto</option>
                    <option value="Corrida" class="bg-slate-900">Corrida</option>
                    <option value="Sobrevivência" class="bg-slate-900">Sobrevivência</option>
                    <option value="Terror de Mascote" class="bg-slate-900">Terror de Mascote</option>
                    <option value="Ação" class="bg-slate-900">Ação</option>
                    <option value="Estratégia" class="bg-slate-900">Estratégia</option>
                </select>

                <input type="number" step="0.01" name="preco" placeholder="Preço" class="bg-slate-900 p-3 rounded text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600" required>

            </div>

            <button class="bg-purple-600 hover:bg-purple-700 transition-colors mt-6 px-6 py-3 rounded-lg text-white font-medium">
                Salvar
            </button>

        </form>

    </div>

@endsection