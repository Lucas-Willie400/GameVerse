@extends('layouts.app')

@section('content')

    <div class="glass rounded-2xl overflow-hidden">

        <h2 class="text-3xl font-bold mb-6">
            Editar Torneio
        </h2>

        <form action="{{ route('torneios.update', $torneio->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-3 gap-4">

                <input type="text" name="titulo" value="{{ $torneio->titulo }}" class="bg-slate-900 p-3 rounded">

                <input type="number" step="0.01" name="premio" value="{{ $torneio->premio }}"
                    class="bg-slate-900 p-3 rounded">

                <input type="date" name="data_evento" value="{{ $torneio->data_evento }}" class="bg-slate-900 p-3 rounded">

            </div>

            <button class="bg-purple-600 mt-6 px-6 py-3 rounded-lg">
                Atualizar
            </button>

        </form>

    </div>

@endsection