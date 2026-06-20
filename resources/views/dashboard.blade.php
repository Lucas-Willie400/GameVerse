@extends('layouts.app')

@section('content')

    <div class="glass neon rounded-3xl p-8 mb-8 block transition-all duration-300 hover:border-purple-400/80 hover:bg-purple-900/20
    hover:scale-105 hover:shadow-[0_0_20px_5px_rgba(147,51,234,0.6)] hover:cursor-pointer  ">
        <h2 class="text-4xl font-bold mb-2">
            Bem-vindo, Administrador 👋
        </h2>
        <p class="text-gray-300">
            Painel de gerenciamento GameVerse Studios
        </p>
    </div>

    <div class="grid lg:grid-cols-4 gap-6 mb-8">

        <!-- Card Jogos -->
        <a href="{{ route('jogos.index') }}" 
           class="glass neon rounded-2xl p-6 block transition-all duration-300 
                  hover:scale-105 hover:shadow-[0_0_20px_5px_rgba(147,51,234,0.6)] 
                  hover:border-purple-400/80 hover:bg-purple-900/20">
            <p class="text-gray-400">Jogos</p>
            <h3 class="text-4xl font-bold mt-2">
                {{ App\Models\Jogo::count() }}
            </h3>
        </a>

        <!-- Card Desenvolvedores -->
        <a href="{{ route('desenvolvedores.index') }}" 
           class="glass neon rounded-2xl p-6 block transition-all duration-300 
                  hover:scale-105 hover:shadow-[0_0_20px_5px_rgba(147,51,234,0.6)] 
                  hover:border-purple-400/80 hover:bg-purple-900/20">
            <p class="text-gray-400">Desenvolvedores</p>
            <h3 class="text-4xl font-bold mt-2">
                {{ App\Models\Desenvolvedor::count() }}
            </h3>
        </a>

        <!-- Card Torneios -->
        <a href="{{ route('torneios.index') }}" 
           class="glass neon rounded-2xl p-6 block transition-all duration-300 
                  hover:scale-105 hover:shadow-[0_0_20px_5px_rgba(147,51,234,0.6)] 
                  hover:border-purple-400/80 hover:bg-purple-900/20">
            <p class="text-gray-400">Torneios</p>
            <h3 class="text-4xl font-bold mt-2">
                {{ App\Models\Torneio::count() }}
            </h3>
        </a>

        <!-- Card Prêmios -->
        <a href="{{ route('torneios.index') }}" 
           class="glass neon rounded-2xl p-6 block transition-all duration-300 
                  hover:scale-105 hover:shadow-[0_0_20px_5px_rgba(147,51,234,0.6)] 
                  hover:border-purple-400/80 hover:bg-purple-900/20">
            <p class="text-gray-400">Prêmios</p>
            <h3 class="text-4xl font-bold mt-2">
                R$ {{ number_format(App\Models\Torneio::sum('premio'), 2, ',', '.') }}
            </h3>
        </a>

    </div>

    <div class="grid lg:grid-cols-2 gap-6">

        <!-- Card Jogos Recentes -->
        <div class="glass rounded-2xl p-6 transition-all duration-300 
                    hover:shadow-[0_0_15px_3px_rgba(147,51,234,0.4)] 
                    hover:border-purple-400/50 hover:bg-purple-900/10">
            <h3 class="text-2xl mb-4">
                🎮 Jogos Recentes
            </h3>
            <table class="w-full">
                @foreach(App\Models\Jogo::latest()->take(5)->get() as $jogo)
                    <tr class="border-b border-purple-900 transition-all duration-200 hover:bg-purple-800/30 hover:pl-2">
                        <td class="p-3">{{ $jogo->nome }}</td>
                        <td>R$ {{ $jogo->preco }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <!-- Card Próximos Torneios -->
        <div class="glass rounded-2xl p-6 transition-all duration-300 
                    hover:shadow-[0_0_15px_3px_rgba(147,51,234,0.4)] 
                    hover:border-purple-400/50 hover:bg-purple-900/10">
            <h3 class="text-2xl mb-4">
                🏆 Próximos Torneios
            </h3>
            <table class="w-full">
                @foreach(App\Models\Torneio::latest()->take(5)->get() as $torneio)
                    <tr class="border-b border-purple-900 transition-all duration-200 hover:bg-purple-800/30 hover:pl-2">
                        <td class="p-3">{{ $torneio->titulo }}</td>
                        <td>{{ $torneio->data_evento }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection