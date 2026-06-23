@extends('layouts.app')

@section('content')

<!-- CABEÇALHO -->

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

    <div>

        <h1 class="text-5xl font-black mb-2">
            🎮 Biblioteca de Jogos
        </h1>

        <p class="text-gray-400">
            Gerencie todos os jogos cadastrados na GameVerse Studios
        </p>

    </div>

    <a href="{{ route('jogos.create') }}"
        class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-6 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

        <i class="fa-solid fa-plus mr-2"></i>
        Novo Jogo

    </a>

</div>

<!-- CARDS -->

<div class="grid md:grid-cols-3 gap-6 mb-8">

    <div class="glass rounded-3xl p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-gray-400">
                    Total de Jogos
                </p>

                <h3 class="text-4xl font-bold mt-2">
                    {{ $jogos->count() }}
                </h3>

            </div>

            <div class="text-5xl">
                🎮
            </div>

        </div>

    </div>

    <div class="glass rounded-3xl p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-gray-400">
                    Preço Médio
                </p>

                <h3 class="text-4xl font-bold mt-2">

                    R$
                    {{ number_format($jogos->avg('preco'),2,',','.') }}

                </h3>

            </div>

            <div class="text-5xl">
                💰
            </div>

        </div>

    </div>

    <div class="glass rounded-3xl p-6">

        <div class="flex justify-between">

            <div>

                <p class="text-gray-400">
                    Receita Potencial
                </p>

                <h3 class="text-4xl font-bold mt-2">

                    R$
                    {{ number_format($jogos->sum('preco'),2,',','.') }}

                </h3>

            </div>

            <div class="text-5xl">
                📈
            </div>

        </div>

    </div>

</div>

<!-- PESQUISA -->

<div class="glass rounded-3xl p-5 mb-6">

    <div class="flex items-center gap-3">

        <i class="fa-solid fa-magnifying-glass text-purple-400"></i>

        <input
            type="text"
            id="buscaJogos"
            placeholder="Pesquisar jogo..."
            class="bg-transparent outline-none w-full">

    </div>

</div>

<!-- TABELA -->

<div class="glass rounded-3xl overflow-hidden">

    <div
        class="bg-gradient-to- from-purple-700 to-indigo-700 px-6 py-5 flex justify-between items-center">

        <h2 class="text-xl font-bold">

            Jogos Cadastrados

        </h2>

        <span class="text-purple-200">

            {{ $jogos->count() }} registros

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b border-purple-500/20">

                    <th class="p-5 text-left">#</th>

                    <th class="text-left">Nome</th>

                    <th class="text-left">Gênero</th>

                    <th class="text-left">Preço</th>

                    <th class="text-center">Ações</th>

                </tr>

            </thead>

            <tbody id="tabelaJogos">

                @foreach($jogos as $jogo)

                    <tr
                        class="border-b border-slate-800 hover:bg-purple-900/10 transition duration-300">

                        <td class="p-5 text-purple-400 font-bold">
                            #{{ $jogo->id }}
                        </td>

                        <td class="font-medium nome-jogo">
                            {{ $jogo->nome }}
                        </td>

                        <td>

                            <span
                                class="px-3 py-1 rounded-full text-sm bg-purple-600/20 text-purple-300">

                                {{ $jogo->genero }}

                            </span>

                        </td>

                        <td class="font-semibold text-green-400">

                            R$
                            {{ number_format($jogo->preco,2,',','.') }}

                        </td>

                        <td>

                            <div class="flex justify-center gap-3 py-3">

                                <a href="{{ route('jogos.edit',$jogo->id) }}"
                                    class="px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 transition">

                                    <i class="fa-solid fa-pen"></i>

                                </a>

                                <form
                                    action="{{ route('jogos.destroy',$jogo->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Deseja excluir este jogo?')"
                                        class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 transition">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

document.getElementById('buscaJogos')
.addEventListener('keyup', function() {

    let valor = this.value.toLowerCase();

    document.querySelectorAll('#tabelaJogos tr')
    .forEach(linha => {

        const nome =
        linha.querySelector('.nome-jogo')
        ?.innerText
        .toLowerCase();

        linha.style.display =
            nome.includes(valor)
            ? ''
            : 'none';

    });

});

</script>

@endsection