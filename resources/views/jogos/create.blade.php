@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    @if ($errors->any())
        <div class="glass border border-red-500/30 bg-red-950/20 text-red-400 p-5 rounded-2xl mb-6 shadow-lg shadow-red-500/5">
            <div class="flex items-center gap-3 mb-2 font-bold">
                <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                <span>Por favor, corrija os erros abaixo:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-sm text-gray-300 pl-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-8">

        <div>

            <h1 class="text-5xl font-black mb-2">
                🎮 Novo Jogo
            </h1>

            <p class="text-gray-400 text-lg">
                Adicione um novo título ao catálogo da GameVerse Studios
            </p>

        </div>

        <a href="{{ route('jogos.index') }}"
            class="glass px-6 py-4 rounded-2xl hover:bg-purple-600/10 transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>
            Voltar

        </a>

    </div>

    <div class="grid lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">

            <div
                class="glass rounded-3xl p-8 relative overflow-hidden">

                <div
                    class="absolute top-0 right-0 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl">
                </div>

                <form
                    action="{{ route('jogos.store') }}"
                    method="POST"
                    class="relative z-10">

                    @csrf

                    <div class="space-y-6">

                        <div>

                            <label
                                class="block text-gray-400 mb-2">

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
                                    value="{{ old('nome') }}"
                                    required
                                    placeholder="Ex: Cyber Runner"
                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                            </div>

                        </div>

                        <div
                            class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label
                                    class="block text-gray-400 mb-2">

                                    Gênero

                                </label>

                                <select
                                    id="genero"
                                    name="genero"
                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 text-white focus:border-purple-500 focus:outline-none">

                                    <option value="">
                                        Selecione
                                    </option>

                                    <option {{ old('genero') == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                                    <option {{ old('genero') == 'RPG' ? 'selected' : '' }}>RPG</option>
                                    <option {{ old('genero') == 'RPG de Mundo Aberto' ? 'selected' : '' }}>RPG de Mundo Aberto</option>
                                    <option {{ old('genero') == 'Corrida' ? 'selected' : '' }}>Corrida</option>
                                    <option {{ old('genero') == 'Sobrevivência' ? 'selected' : '' }}>Sobrevivência</option>
                                    <option {{ old('genero') == 'Terror de Mascote' ? 'selected' : '' }}>Terror de Mascote</option>
                                    <option {{ old('genero') == 'Ação' ? 'selected' : '' }}>Ação</option>
                                    <option {{ old('genero') == 'Estratégia' ? 'selected' : '' }}>Estratégia</option>

                                </select>

                            </div>

                            <div>

                                <label
                                    class="block text-gray-400 mb-2">

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
                                        value="{{ old('preco') }}"
                                        class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                                </div>

                            </div>

                        </div>

                        <div>

                            <label
                                class="block text-gray-400 mb-2">

                                Descrição

                            </label>

                            <textarea
                                name="descricao"
                                rows="5"
                                placeholder="Descreva o jogo..."
                                class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 text-white focus:border-purple-500 focus:outline-none">{{ old('descricao') }}</textarea>

                        </div>

                        <div
                            class="flex flex-wrap gap-4 pt-4">

                            <button
                                type="submit"
                                class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>

                                Salvar Jogo

                            </button>

                            <button
                                type="reset"
                                class="glass px-8 py-4 rounded-2xl hover:bg-red-500/10 transition">

                                Limpar

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div>

            <div class="glass rounded-3xl p-6 sticky top-8">

                <h3 class="text-xl font-bold mb-6">

                    🎮 Preview

                </h3>

                <div
                    class="rounded-3xl overflow-hidden bg-gradient-to- from-purple-900/40 to-indigo-900/40 p-8 text-center">

                    <div
                        class="text-7xl mb-5">

                        🎮

                    </div>

                    <h2
                        id="previewNome"
                        class="text-2xl font-bold">

                        Nome do Jogo

                    </h2>

                    <p
                        id="previewGenero"
                        class="text-purple-400 mt-2">

                        Gênero

                    </p>

                    <div
                        id="previewPreco"
                        class="mt-6 text-4xl font-black text-green-400">

                        R$ 0,00

                    </div>

                </div>

                <div class="mt-6 space-y-4">

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            Status
                        </p>

                        <p class="text-green-400">
                            Pronto para publicação
                        </p>

                    </div>

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            Catálogo
                        </p>

                        <p class="text-grid">
                            GameVerse Studios
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

// Atualização inicial baseada nos valores antigos do Laravel (old)
document.addEventListener('DOMContentLoaded', () => {
    if(nome.value) document.getElementById('previewNome').innerText = nome.value;
    if(genero.value) document.getElementById('previewGenero').innerText = genero.value;
    if(preco.value) {
        let valor = parseFloat(preco.value || 0);
        document.getElementById('previewPreco').innerText = 'R$ ' + valor.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    }
});

nome.addEventListener('input', () => {

    document.getElementById('previewNome').innerText =
        nome.value || 'Nome do Jogo';

});

genero.addEventListener('change', () => {

    document.getElementById('previewGenero').innerText =
        genero.value || 'Gênero';

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