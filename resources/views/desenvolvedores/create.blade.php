@extends('layouts.app')

@section('content')

    <div class="glass rounded-2xl overflow-hidden p-8">

        <h2 class="text-3xl font-bold mb-6">
            Novo Desenvolvedor
        </h2>

        <form action="{{ route('desenvolvedores.store') }}" method="POST">

            @csrf

            <div class="grid md:grid-cols-3 gap-4">

                <input type="text" name="nome" placeholder="Nome" class="bg-slate-900 p-3 rounded">

                <input type="text" name="especialidade" placeholder="Especialidade" class="bg-slate-900 p-3 rounded">

                <input type="number" name="experiencia" placeholder="Experiência" class="bg-slate-900 p-3 rounded">

            </div>

            <button class="bg-purple-600 mt-6 px-6 py-3 rounded-lg">
                Salvar
            </button>

        </form>

    </div>

@endsection