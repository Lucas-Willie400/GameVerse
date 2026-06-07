@extends('layouts.app')

@section('content')

    <div class="glass rounded-2xl overflow-hidden">

        <h2 class="text-3xl font-bold mb-6">
            Novo Jogo
        </h2>

        <form action="{{ route('jogos.store') }}" method="POST">

            @csrf

            <div class="grid md:grid-cols-3 gap-4">

                <input type="text" name="nome" placeholder="Nome do jogo" class="bg-slate-900 p-3 rounded">

                <input type="text" name="genero" placeholder="Gênero" class="bg-slate-900 p-3 rounded">

                <input type="number" step="0.01" name="preco" placeholder="Preço" class="bg-slate-900 p-3 rounded">

            </div>

            <button class="bg-purple-600 mt-6 px-6 py-3 rounded-lg">
                Salvar
            </button>

        </form>

    </div>

@endsection