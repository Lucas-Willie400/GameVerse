@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->

    <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-8">

        <div>

            <h1 class="text-5xl font-black mb-2">
                ✏️ Editar Torneio
            </h1>

            <p class="text-gray-400 text-lg">
                Atualize as informações do torneio
            </p>

        </div>

        <a href="{{ route('torneios.index') }}"
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
                    class="absolute top-0 right-0 w-80 h-80 bg-yellow-500/10 rounded-full blur-3xl">
                </div>

                <form
                    action="{{ route('torneios.update', $torneio->id) }}"
                    method="POST"
                    class="relative z-10">

                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        <!-- TÍTULO -->

                        <div>

                            <label class="block text-gray-400 mb-2">
                                Nome do Torneio
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-trophy absolute left-5 top-5 text-yellow-400"></i>

                                <input
                                    id="titulo"
                                    type="text"
                                    name="titulo"
                                    value="{{ $torneio->titulo }}"
                                    required

                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-yellow-400 focus:outline-none">

                            </div>

                        </div>

                        <!-- PRÊMIO E DATA -->

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="block text-gray-400 mb-2">
                                    Premiação
                                </label>

                                <div class="relative">

                                    <span class="absolute left-5 top-4 text-green-400 font-bold">
                                        R$
                                    </span>

                                    <input
                                        id="premio"
                                        type="number"
                                        step="0.01"
                                        name="premio"
                                        value="{{ $torneio->premio }}"
                                        required

                                        class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 pl-14 text-white focus:border-green-400 focus:outline-none">

                                </div>

                            </div>

                            <div>

                                <label class="block text-gray-400 mb-2">
                                    Data do Evento
                                </label>

                                <input
                                    id="data"
                                    type="date"
                                    name="data_evento"
                                    value="{{ \Carbon\Carbon::parse($torneio->data_evento)->format('Y-m-d') }}"
                                    required

                                    class="w-full bg-slate-900/70 border border-purple-900/40 rounded-2xl p-4 text-white focus:border-yellow-400 focus:outline-none">

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

                        <div class="flex flex-wrap gap-4 pt-4">

                            <button
                                type="submit"

                                class="bg-gradient-to- from-yellow-500 to-orange-500 px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition-all duration-300 shadow-lg shadow-yellow-500/30">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>
                                Atualizar Torneio

                            </button>

                            <a
                                href="{{ route('torneios.index') }}"

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
                    🏆 Preview
                </h3>

                <div
                    class="rounded-3xl overflow-hidden bg-gradient-to- from-yellow-900/30 to-orange-900/30 p-8 text-center">

                    <div class="text-7xl mb-5">
                        🏆
                    </div>

                    <h2
                        id="previewTitulo"
                        class="text-2xl font-bold">

                        {{ $torneio->titulo }}

                    </h2>

                    <div
                        id="previewPremio"
                        class="mt-6 text-4xl font-black text-green-400">

                        R$ {{ number_format($torneio->premio,2,',','.') }}

                    </div>

                    <div
                        id="previewData"
                        class="mt-4 text-yellow-400">

                        {{ \Carbon\Carbon::parse($torneio->data_evento)->format('d/m/Y') }}

                    </div>

                </div>

                <div class="mt-6 space-y-4">

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            ID do Torneio
                        </p>

                        <p>
                            #{{ $torneio->id }}
                        </p>

                    </div>

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            Status
                        </p>

                        <p id="statusEvento">
                            {{ \Carbon\Carbon::parse($torneio->data_evento)->isFuture() ? 'Agendado' : 'Encerrado' }}
                        </p>

                    </div>

                    <div class="glass p-4 rounded-2xl">

                        <p class="text-gray-400 text-sm">
                            Dias Restantes
                        </p>

                        <p id="diasRestantes">
                            —
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const titulo = document.getElementById('titulo');
const premio = document.getElementById('premio');
const data = document.getElementById('data');

function atualizarPreview() {

    document.getElementById('previewTitulo').innerText =
        titulo.value || 'Nome do Torneio';

    let valor = parseFloat(premio.value || 0);

    document.getElementById('previewPremio').innerText =
        'R$ ' + valor.toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

    if (data.value) {

        const evento = new Date(data.value);
        const hoje = new Date();

        const dias =
            Math.ceil((evento - hoje) / (1000 * 60 * 60 * 24));

        document.getElementById('previewData').innerText =
            evento.toLocaleDateString('pt-BR');

        document.getElementById('diasRestantes').innerText =
            dias > 0 ? dias + ' dias' : 'Evento encerrado';

        document.getElementById('statusEvento').innerText =
            dias > 0 ? 'Agendado' : 'Encerrado';
    }

}

titulo.addEventListener('input', atualizarPreview);
premio.addEventListener('input', atualizarPreview);
data.addEventListener('change', atualizarPreview);

atualizarPreview();

</script>

@endsection