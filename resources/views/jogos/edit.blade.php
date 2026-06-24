@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->

    <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-8">

        <div>

            <h1 class="text-5xl font-black mb-2">
                ✏️ Editar Jogo
            </h1>

            <p class="text-gray-400 text-lg">
                Atualize as informações de {{ $jogo->nome }}
            </p>

        </div>

        <a href="{{ route('jogos.index') }}"
            class="glass px-6 py-4 rounded-2xl hover:bg-purple-600/10 transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>
            Voltar

        </a>

    </div>

    <div class="grid lg:grid-cols-3 gap-8">

        <!-- FORMULÁRIO -->

        <div class="lg:col-span-2">

            <div class="glass rounded-3xl p-8 relative overflow-hidden">

                <!-- brilho decorativo -->

                <div
                    class="absolute top-0 right-0 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl">
                </div>

                <form
                    action="{{ route('jogos.update', $jogo->id) }}"
                    method="POST"
                    class="relative z-10">

                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        <!-- NOME -->

                        <div>

                            <label class="block text-gray-400 mb-2">

                                Nome do Jogo

                            </label>

                            <div class="relative">

                                <i
                                    class="fa-solid fa-gamepad absolute left-5 top-5 text-purple-400">
                                </i>

                                <input
                                    id="nome"
                                    type="text"
                                    name="nome"
                                    value="{{ $jogo->nome }}"
                                    required

                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                            </div>

                        </div>

                        <!-- GÊNERO E PREÇO -->

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="block text-gray-400 mb-2">

                                    Gênero

                                </label>

                                <select
                                    id="genero"
                                    name="genero"

                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 text-white focus:border-purple-500 focus:outline-none">

                                    @php
                                        $generos = [
                                            'Aventura',
                                            'RPG',
                                            'RPG de Mundo Aberto',
                                            'Corrida',
                                            'Sobrevivência',
                                            'Terror de Mascote',
                                            'Ação',
                                            'Estratégia'
                                        ];
                                    @endphp

                                    @foreach($generos as $genero)

                                        <option
                                            value="{{ $genero }}"
                                            {{ $jogo->genero == $genero ? 'selected' : '' }}>

                                            {{ $genero }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div>

                                <label class="block text-gray-400 mb-2">

                                    Preço

                                </label>

                                <div class="relative">

                                    <span
                                        class="absolute left-5 top-4 text-purple-400">

                                        R$

                                    </span>

                                    <input
                                        id="preco"
                                        type="number"
                                        step="0.01"
                                        name="preco"
                                        value="{{ $jogo->preco }}"

                                        class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                                </div>

                            </div>

                        </div>

                        <!-- STATUS -->

                        <div
                            class="bg-green-500/10 border border-green-500/20 rounded-2xl p-4">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                                </div>

                                <span class="text-green-400">

                                    Registro encontrado e pronto para edição

                                </span>

                            </div>

                        </div>

                        <!-- BOTÕES -->

                        <div
                            class="flex flex-wrap gap-4 pt-4">

                            <button
                                type="submit"

                                class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>

                                Atualizar Jogo

                            </button>

                            <a
                                href="{{ route('jogos.index') }}"

                                class="glass px-8 py-4 rounded-2xl hover:bg-red-500/10 transition">

                                Cancelar

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- PREVIEW -->

        <div>

            <div class="glass rounded-3xl p-6 sticky top-8">

                <h3 class="text-xl font-bold mb-6">

                    🎮 Preview Atual

                </h3>

                <div
                    class="rounded-3xl overflow-hidden bg-gradient-to- from-purple-900/40 to-indigo-900/40 p-8 text-center">

                    <div class="text-7xl mb-5">
                        🎮
                    </div>

                    <h2
                        id="previewNome"
                        class="text-2xl font-bold">

                        {{ $jogo->nome }}

                    </h2>

                    <p
                        id="previewGenero"
                        class="text-purple-400 mt-2">

                        {{ $jogo->genero }}

                    </p>

                    <div
                        id="previewPreco"
                        class="mt-6 text-4xl font-black text-green-400">

                        R$ {{ number_format($jogo->preco, 2, ',', '.') }}

                    </div>

                </div>

                <div class="mt-6 space-y-4">

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            ID do Registro
                        </p>

                        <p class="font-bold">
                            #{{ $jogo->id }}
                        </p>

                    </div>

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            Última Alteração
                        </p>

                        <p>
                            {{ $jogo->updated_at->format('d/m/Y H:i') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const nome =
document.getElementById('nome');

const genero =
document.getElementById('genero');

const preco =
document.getElementById('preco');

nome.addEventListener('input', () => {

    document.getElementById('previewNome').innerText =
        nome.value || 'Nome do Jogo';

});

genero.addEventListener('change', () => {

    document.getElementById('previewGenero').innerText =
        genero.value;

});

preco.addEventListener('input', () => {

    let valor = parseFloat(preco.value || 0);

    document.getElementById('previewPreco').innerText =
        'R$ ' +
        valor.toLocaleString('pt-BR', {
            minimumFractionDigits: 2
        });

});

</script>

@endsection