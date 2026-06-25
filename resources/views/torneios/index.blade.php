@extends('layouts.app')

@section('content')

<div class="space-y-8">
    @if(session('success'))

<div
    id="toast-success"
    class="glass border border-green-500/30 bg-green-500/10 rounded-2xl p-4 flex items-center gap-4 animate-pulse">

    <div
        class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">

        <i class="fa-solid fa-circle-check text-green-400 text-xl"></i>

    </div>

    <div>

        <h3 class="font-bold text-green-400">
            Operação realizada com sucesso
        </h3>

        <p class="text-gray-300">
            {{ session('success') }}
        </p>

    </div>

</div>

@endif

<div class="flex flex-col lg:flex-row justify-between lg:items-center gap-6">

    <div>

        <h1 class="text-5xl font-black mb-2">
            🏆 Torneios
        </h1>

        <p class="text-gray-400">
            Gerencie os campeonatos e competições da GameVerse Studios
        </p>

    </div>

    <a href="{{ route('torneios.create') }}"
        class="bg-gradient-to- from-purple-600 to-fuchsia-600 px-6 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

        <i class="fa-solid fa-plus mr-2"></i>
        Novo Torneio

    </a>

</div>

<!-- ESTATÍSTICAS -->

<div class="grid md:grid-cols-3 gap-6">

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Total de Torneios
        </p>

        <h3 class="text-4xl font-black">
            {{ $torneios->count() }}
        </h3>

    </div>

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Premiação Total
        </p>

        <h3 class="text-4xl font-black text-green-400">
            R$ {{ number_format($torneios->sum('premio'),2,',','.') }}
        </h3>

    </div>

    <div class="glass rounded-3xl p-6">

        <p class="text-gray-400 mb-2">
            Maior Prêmio
        </p>

        <h3 class="text-4xl font-black text-yellow-400">
            R$ {{ number_format($torneios->max('premio'),2,',','.') }}
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
                id="searchTorneio"
                type="text"
                placeholder="Pesquisar torneio..."

                class="w-full bg-slate-900/70 border border-purple-900/30 rounded-2xl p-4 pl-14 text-white">

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-purple-800">

                    <th class="p-5 text-left">
                        Torneio
                    </th>

                    <th class="text-left">
                        Prêmio
                    </th>

                    <th class="text-left">
                        Data
                    </th>

                    <th class="text-left">
                        Status
                    </th>

                    <th class="text-center">
                        Ações
                    </th>

                </tr>

            </thead>

            <tbody id="torneioTable">

                @foreach($torneios as $torneio)

                <tr
                    class="border-b border-purple-900/20 hover:bg-purple-900/10 transition">

                    <td class="p-5">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to- from-yellow-500 to-orange-500 flex items-center justify-center text-xl">

                                🏆

                            </div>

                            <div>

                                <p class="font-semibold">
                                    {{ $torneio->titulo }}
                                </p>

                                <p class="text-xs text-gray-500">
                                    ID #{{ $torneio->id }}
                                </p>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span
                            class="text-green-400 font-bold text-lg">

                            R$ {{ number_format($torneio->premio,2,',','.') }}

                        </span>

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($torneio->data_evento)->format('d/m/Y') }}

                    </td>

                    <td>

                        @if(\Carbon\Carbon::parse($torneio->data_evento)->isFuture())

                            <span
                                class="bg-green-500/20 text-green-400 px-4 py-2 rounded-full text-sm">

                                Agendado

                            </span>

                        @else

                            <span
                                class="bg-gray-500/20 text-gray-300 px-4 py-2 rounded-full text-sm">

                                Encerrado

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="flex justify-center gap-3">

                            <a
                                href="{{ route('torneios.edit',$torneio->id) }}"

                                class="bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded-xl transition">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form
                                action="{{ route('torneios.destroy',$torneio->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Deseja excluir este torneio?')"

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
document.getElementById('searchTorneio');

search.addEventListener('keyup', function(){

    let value =
    this.value.toLowerCase();

    document.querySelectorAll('#torneioTable tr')
    .forEach(row => {

        row.style.display =
        row.innerText.toLowerCase().includes(value)
        ? ''
        : 'none';

    });

});

</script>

@endsection
