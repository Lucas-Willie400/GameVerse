@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

```
<!-- HEADER -->

<div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-8">

    <div>

        <h1 class="text-5xl font-black mb-2">
            👨‍💻 Novo Desenvolvedor
        </h1>

        <p class="text-gray-400 text-lg">
            Adicione um novo membro à equipe da GameVerse Studios
        </p>

    </div>

    <a href="{{ route('desenvolvedores.index') }}"
        class="glass px-6 py-4 rounded-2xl hover:bg-purple-600/10 transition">

        <i class="fa-solid fa-arrow-left mr-2"></i>
        Voltar

    </a>

</div>

<div class="grid lg:grid-cols-3 gap-8">

    <!-- FORMULÁRIO -->

    <div class="lg:col-span-2">

        <div class="glass rounded-3xl p-8 relative overflow-hidden">

            <div
                class="absolute top-0 right-0 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl">
            </div>

            <form
                action="{{ route('desenvolvedores.store') }}"
                method="POST"
                class="relative z-10">

                @csrf

                <div class="space-y-6">

                    <!-- NOME -->

                    <div>

                        <label class="block text-gray-400 mb-2">
                            Nome do Desenvolvedor
                        </label>

                        <div class="relative">

                            <i
                                class="fa-solid fa-user absolute left-5 top-5 text-purple-400">
                            </i>

                            <input
                                id="nome"
                                type="text"
                                name="nome"
                                required
                                placeholder="Ex: Lucas Sousa"

                                class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                        </div>

                    </div>

                    <!-- ESPECIALIDADE -->

                    <div>

                        <label class="block text-gray-400 mb-2">
                            Especialidade
                        </label>

                        <div class="relative">

                            <i
                                class="fa-solid fa-code absolute left-5 top-5 text-purple-400">
                            </i>

                            <input
                                id="especialidade"
                                type="text"
                                name="especialidade"
                                required
                                placeholder="Ex: Backend Laravel"

                                class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                        </div>

                    </div>

                    <!-- EXPERIÊNCIA -->

                    <div>

                        <label class="block text-gray-400 mb-2">
                            Experiência (anos)
                        </label>

                        <div class="relative">

                            <i
                                class="fa-solid fa-medal absolute left-5 top-5 text-purple-400">
                            </i>

                            <input
                                id="experiencia"
                                type="number"
                                name="experiencia"
                                min="0"
                                max="50"

                                placeholder="0"

                                class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-purple-500 focus:outline-none">

                        </div>

                    </div>

                    <!-- BOTÕES -->

                    <div
                        class="flex flex-wrap gap-4 pt-4">

                        <button
                            type="submit"

                            class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

                            <i class="fa-solid fa-floppy-disk mr-2"></i>

                            Salvar Desenvolvedor

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

    <!-- PREVIEW -->

    <div>

        <div class="glass rounded-3xl p-6 sticky top-8">

            <h3 class="text-xl font-bold mb-6">
                👨‍💻 Preview
            </h3>

            <div
                class="rounded-3xl overflow-hidden bg-gradient-to- from-purple-900/40 to-indigo-900/40 p-8 text-center">

                <div
                    id="avatar"
                    class="w-24 h-24 rounded-full bg-gradient-to- from-purple-600 to-fuchsia-600 mx-auto flex items-center justify-center text-4xl font-bold">

                    ?

                </div>

                <h2
                    id="previewNome"
                    class="text-2xl font-bold mt-6">

                    Nome do Desenvolvedor

                </h2>

                <span
                    id="previewEspecialidade"
                    class="inline-block mt-4 px-4 py-2 rounded-full bg-purple-500/20 text-purple-300">

                    Especialidade

                </span>

                <div class="mt-8">

                    <p class="text-gray-400 mb-2">
                        Experiência
                    </p>

                    <div
                        class="h-3 bg-slate-800 rounded-full overflow-hidden">

                        <div
                            id="expBar"
                            class="h-full bg-gradient-to- from-purple-500 to-fuchsia-500 w-0 transition-all duration-500">
                        </div>

                    </div>

                    <p
                        id="previewExperiencia"
                        class="mt-3 text-green-400 font-bold">

                        0 anos

                    </p>

                </div>

            </div>

            <div class="mt-6 space-y-4">

                <div class="glass p-4 rounded-2xl">

                    <p class="text-gray-400 text-sm">
                        Status
                    </p>

                    <p class="text-green-400">
                        Pronto para cadastro
                    </p>

                </div>

                <div class="glass p-4 rounded-2xl">

                    <p class="text-gray-400 text-sm">
                        Equipe
                    </p>

                    <p>
                        GameVerse Studios
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

<script>

const nome =
document.getElementById('nome');

const especialidade =
document.getElementById('especialidade');

const experiencia =
document.getElementById('experiencia');

nome.addEventListener('input', () => {

    document.getElementById('previewNome').innerText =
        nome.value || 'Nome do Desenvolvedor';

    document.getElementById('avatar').innerText =
        nome.value
        ? nome.value.charAt(0).toUpperCase()
        : '?';

});

especialidade.addEventListener('input', () => {

    document.getElementById('previewEspecialidade').innerText =
        especialidade.value || 'Especialidade';

});

experiencia.addEventListener('input', () => {

    let anos =
        parseInt(experiencia.value || 0);

    document.getElementById('previewExperiencia').innerText =
        anos + ' anos';

    let largura =
        Math.min(anos * 5, 100);

    document.getElementById('expBar').style.width =
        largura + '%';

});

</script>

@endsection
