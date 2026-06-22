@extends('layouts.app')

@section('content')

    <div class="glass rounded-2xl overflow-hidden p-8 relative transition-all duration-300 hover:shadow-[0_0_20px_4px_rgba(147,51,234,0.2)]">
        <!-- Brilho decorativo -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl"></div>

        <h2 class="text-3xl font-bold mb-8 bg-gradient-to- from-white to-purple-300 bg-clip-text text-transparent relative z-10 flex items-center gap-3">
            <span class="text-purple-400">🎮</span> Novo Jogo
        </h2>

        <form action="{{ route('jogos.store') }}" method="POST" class="relative z-10">
            @csrf

            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <!-- Campo Nome -->
                <div class="group">
                    <label class="block text-gray-400 mb-2 text-sm font-medium">Nome do Jogo</label>
                    <input type="text" 
                           name="nome" 
                           placeholder="Digite o nome do jogo" 
                           class="w-full bg-slate-900/70 border border-purple-900/40 p-4 rounded-xl text-white 
                                  placeholder-gray-500 transition-all duration-300 
                                  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 
                                  focus:shadow-[0_0_12px_2px_rgba(147,51,234,0.2)]
                                  hover:border-purple-700/60">
                </div>

                <!-- Campo Gênero -->
                <div class="group">
                    <label class="block text-gray-400 mb-2 text-sm font-medium">Gênero</label>
                    <select name="genero" 
                            class="w-full bg-slate-900/70 border border-purple-900/40 p-4 rounded-xl text-white 
                                   cursor-pointer transition-all duration-300
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                   focus:shadow-[0_0_12px_2px_rgba(147,51,234,0.2)]
                                   hover:border-purple-700/60">
                        <option value="" disabled selected hidden class="bg-slate-900">Selecione um gênero</option>
                        <option value="Aventura" class="bg-slate-900 hover:bg-purple-900">🏞️ Aventura</option>
                        <option value="RPG" class="bg-slate-900 hover:bg-purple-900">⚔️ RPG</option>
                        <option value="RPG de Mundo Aberto" class="bg-slate-900 hover:bg-purple-900">🌍 RPG de Mundo Aberto</option>
                        <option value="Corrida" class="bg-slate-900 hover:bg-purple-900">🏎️ Corrida</option>
                        <option value="Sobrevivência" class="bg-slate-900 hover:bg-purple-900">🛡️ Sobrevivência</option>
                        <option value="Terror de Mascote" class="bg-slate-900 hover:bg-purple-900">👻 Terror de Mascote</option>
                        <option value="Ação" class="bg-slate-900 hover:bg-purple-900">💥 Ação</option>
                        <option value="Estratégia" class="bg-slate-900 hover:bg-purple-900">🧠 Estratégia</option>
                    </select>
                </div>

                <!-- Campo Preço -->
                <div class="group">
                    <label class="block text-gray-400 mb-2 text-sm font-medium">Preço (R$)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">R$</span>
                        <input type="number" 
                               step="0.01" 
                               name="preco" 
                               placeholder="0,00" 
                               class="w-full bg-slate-900/70 border border-purple-900/40 p-4 pl-8 rounded-xl text-white 
                                      placeholder-gray-500 transition-all duration-300
                                      focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                      focus:shadow-[0_0_12px_2px_rgba(147,51,234,0.2)]
                                      hover:border-purple-700/60">
                    </div>
                </div>
            </div>

            <!-- Botão Salvar -->
            <button type="submit" 
                    class="bg-gradient-to- from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500
                           px-8 py-4 rounded-xl text-white font-medium transition-all duration-300
                           hover:scale-105 hover:shadow-[0_0_18px_4px_rgba(147,51,234,0.5)]
                           active:scale-95 flex items-center gap-2">
                <span>💾</span> Salvar Jogo
            </button>
        </form>
    </div>

    <!-- Animação de entrada -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.glass');
            container.style.opacity = '0';
            container.style.transform = 'translateY(15px)';
            container.style.transition = 'all 0.5s ease';

            setTimeout(() => {
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 80);
        });
    </script>

@endsection