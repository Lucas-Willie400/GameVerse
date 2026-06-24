@extends('layouts.app')

@section('content')

<div class="space-y-8">

```
<!-- HEADER -->

<div class="flex flex-col lg:flex-row justify-between lg:items-center gap-6">

    <div>

        <h1 class="text-5xl font-black mb-2">
            👨‍💻 Desenvolvedores
        </h1>

        <p class="text-gray-400">
            Gerencie a equipe de desenvolvimento da GameVerse Studios
        </p>

    </div>

    <a href="{{ route('desenvolvedores.create') }}"
        class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-6 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

        <i class="fa-solid fa-plus mr-2"></i>
        Novo Desenvolvedor

    </a>

</div>

<!-- ESTATÍSTICAS -->

<div class="grid md:grid-cols-3 gap-6">

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Desenvolvedores
        </p>

        <h3 class="text-4xl font-black">
            {{ $desenvolvedores->count() }}
        </h3>

    </div>

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Média de Experiência
        </p>

        <h3 class="text-4xl font-black text-green-400">
            {{ round($desenvolvedores->avg('experiencia'),1) }}
        </h3>

    </div>

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Especialidades
        </p>

        <h3 class="text-4xl font-black text-purple-400">
            {{ $desenvolvedores->pluck('especialidade')->unique()->count() }}
        </h3>

    </div>

</div>

<!-- TABELA -->

<div class="glass rounded-3xl overflow-hidden">

    <div class="p-6 border-b border-purple-900/30">

        <div class="relative">

            <i
                class="fa-solid fa-magnifying-glass absolute left-5 top-4 text-purple-400">
            </i>

            <input
                id="searchDev"
                type="text"
                placeholder="Pesquisar desenvolvedor..."

                class="w-full bg-slate-900/70 border border-purple-900/30 rounded-2xl p-4 pl-14 text-white">

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-purple-900/50">

                    <th class="p-5 text-left">
                        Desenvolvedor
                    </th>

                    <th class="text-left">
                        Especialidade
                    </th>

                    <th class="text-left">
                        Experiência
                    </th>

                    <th class="text-center">
                        Ações
                    </th>

                </tr>

            </thead>

            <tbody id="devTable">

                @foreach($desenvolvedores as $dev)

                <tr
                    class="border-b border-purple-900/20 hover:bg-purple-900/10 transition">

                    <td class="p-5">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to- from-purple-600 to-fuchsia-600 flex items-center justify-center font-bold">

                                {{ strtoupper(substr($dev->nome,0,1)) }}

                            </div>

                            <div>

                                <p class="font-semibold">
                                    {{ $dev->nome }}
                                </p>

                                <p class="text-xs text-gray-500">
                                    ID #{{ $dev->id }}
                                </p>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span
                            class="bg-purple-500/20 text-purple-300 px-4 py-2 rounded-full text-sm">

                            {{ $dev->especialidade }}

                        </span>

                    </td>

                    <td>

                        <div class="flex items-center gap-2">

                            <i class="fa-solid fa-medal text-yellow-400"></i>

                            {{ $dev->experiencia }} anos

                        </div>

                    </td>

                    <td>

                        <div
                            class="flex justify-center gap-3">

                            <a
                                href="{{ route('desenvolvedores.edit',$dev->id) }}"

                                class="bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded-xl transition">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form
                                action="{{ route('desenvolvedores.destroy',$dev->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Deseja excluir este desenvolvedor?')"

                                    class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded-xl transition">

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
```

</div>

<script>

const search =
document.getElementById('searchDev');

search.addEventListener('keyup', function(){

    let value =
    this.value.toLowerCase();

    document.querySelectorAll('#devTable tr')
    .forEach(row => {

        row.style.display =
        row.innerText.toLowerCase().includes(value)
        ? ''
        : 'none';

    });

});

</script>

@endsection
