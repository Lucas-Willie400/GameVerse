@extends('layouts.app')

@section('content')

<!-- HERO -->
<div
    class="relative overflow-hidden rounded-3xl p-8 mb-8 glass neon border border-purple-500/30">

    <div class="absolute inset-0 bg-gradient-to- from-purple-900/40 via-indigo-900/20 to-transparent"></div>

    <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center">

        <div>
            <h1 class="text-5xl font-extrabold mb-3">
                Bem-vindo, Administrador 👋
            </h1>

            <p class="text-lg text-gray-300 mb-6">
                Gerencie jogos, desenvolvedores e torneios em um único lugar.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('jogos.create') }}"
                    class="px-6 py-3 rounded-xl bg-purple-600 hover:bg-purple-500 transition">
                    🎮 Novo Jogo
                </a>

                <a href="{{ route('torneios.create') }}"
                    class="px-6 py-3 rounded-xl border border-purple-500 hover:bg-purple-800/30 transition">
                    🏆 Novo Torneio
                </a>
            </div>
        </div>

        <div class="hidden lg:block text-8xl opacity-20">
            🎮
        </div>

    </div>
</div>

<!-- ESTATÍSTICAS -->
<div class="grid lg:grid-cols-4 gap-6 mb-8">

    <!-- Jogos -->
    <a href="{{ route('jogos.index') }}"
        class="glass neon rounded-3xl p-6 hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center mb-4">
            <span class="text-4xl">🎮</span>
            <span class="text-green-400 text-sm">
                +12%
            </span>
        </div>

        <p class="text-gray-400">
            Jogos
        </p>

        <h3 class="text-5xl font-bold">
            {{ App\Models\Jogo::count() }}
        </h3>
    </a>

    <!-- Desenvolvedores -->
    <a href="{{ route('desenvolvedores.index') }}"
        class="glass neon rounded-3xl p-6 hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center mb-4">
            <span class="text-4xl">👨‍💻</span>
            <span class="text-green-400 text-sm">
                +5%
            </span>
        </div>

        <p class="text-gray-400">
            Desenvolvedores
        </p>

        <h3 class="text-5xl font-bold">
            {{ App\Models\Desenvolvedor::count() }}
        </h3>
    </a>

    <!-- Torneios -->
    <a href="{{ route('torneios.index') }}"
        class="glass neon rounded-3xl p-6 hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center mb-4">
            <span class="text-4xl">🏆</span>
            <span class="text-yellow-400 text-sm">
                Ativos
            </span>
        </div>

        <p class="text-gray-400">
            Torneios
        </p>

        <h3 class="text-5xl font-bold">
            {{ App\Models\Torneio::count() }}
        </h3>
    </a>

    <!-- Prêmios -->
    <div
        class="glass neon rounded-3xl p-6 hover:scale-105 transition duration-300">

        <div class="flex justify-between items-center mb-4">
            <span class="text-4xl">💰</span>
            <span class="text-green-400 text-sm">
                Total
            </span>
        </div>

        <p class="text-gray-400">
            Premiações
        </p>

        <h3 class="text-3xl font-bold">
            R$
            {{ number_format(App\Models\Torneio::sum('premio'), 2, ',', '.') }}
        </h3>
    </div>

</div>

<!-- DESTAQUES -->
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <div class="glass rounded-3xl p-6">
        <h3 class="text-xl mb-3">
            🔥 Jogo Mais Caro
        </h3>

        @php
            $jogoTop = App\Models\Jogo::orderByDesc('preco')->first();
        @endphp

        @if($jogoTop)
            <p class="text-2xl font-bold">
                {{ $jogoTop->nome }}
            </p>

            <p class="text-purple-400">
                R$ {{ number_format($jogoTop->preco,2,',','.') }}
            </p>
        @endif
    </div>

    <div class="glass rounded-3xl p-6">
        <h3 class="text-xl mb-3">
            ⭐ Desenvolvedores
        </h3>

        <p class="text-5xl font-bold">
            {{ App\Models\Desenvolvedor::count() }}
        </p>
    </div>

    <div class="glass rounded-3xl p-6">
        <h3 class="text-xl mb-3">
            🎯 Próximo Evento
        </h3>

        @php
            $evento = App\Models\Torneio::orderBy('data_evento')->first();
        @endphp

        @if($evento)
            <p class="text-2xl font-bold">
                {{ $evento->titulo }}
            </p>

            <p class="text-purple-400">
                {{ $evento->data_evento }}
            </p>
        @endif
    </div>

</div>

<!-- TABELAS -->
<div class="grid lg:grid-cols-2 gap-6">

    <!-- Jogos -->
    <div class="glass rounded-3xl p-6">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">
                🎮 Jogos Recentes
            </h3>

            <a href="{{ route('jogos.index') }}"
                class="text-purple-400 hover:text-purple-300">
                Ver todos →
            </a>
        </div>

        <div class="space-y-3">

            @foreach(App\Models\Jogo::latest()->take(5)->get() as $jogo)

                <div
                    class="flex justify-between items-center p-4 rounded-xl bg-purple-950/20 hover:bg-purple-900/30 transition">

                    <span>
                        {{ $jogo->nome }}
                    </span>

                    <span class="font-bold text-green-400">
                        R$ {{ number_format($jogo->preco,2,',','.') }}
                    </span>

                </div>

            @endforeach

        </div>

    </div>

    <!-- Torneios -->
    <div class="glass rounded-3xl p-6">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">
                🏆 Próximos Torneios
            </h3>

            <a href="{{ route('torneios.index') }}"
                class="text-purple-400 hover:text-purple-300">
                Ver todos →
            </a>
        </div>

        <div class="space-y-3">

            @foreach(App\Models\Torneio::latest()->take(5)->get() as $torneio)

                <div
                    class="flex justify-between items-center p-4 rounded-xl bg-purple-950/20 hover:bg-purple-900/30 transition">

                    <span>
                        {{ $torneio->titulo }}
                    </span>

                    <span class="text-purple-300">
                        {{ $torneio->data_evento }}
                    </span>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection