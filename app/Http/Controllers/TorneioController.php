<?php

namespace App\Http\Controllers;

use App\Models\Torneio;
use Illuminate\Http\Request;

class TorneioController extends Controller
{
    public function index()
    {
        $torneios = Torneio::all();

        return view('torneios.index', compact('torneios'));
    }

    public function create()
    {
        return view('torneios.create');
    }

    public function store(Request $request)
    {
        Torneio::create([
            'titulo' => $request->titulo,
            'premio' => $request->premio,
            'data_evento' => $request->data_evento,
        ]);

        return redirect()->route('torneios.index')->with('success', 'criado com sucesso');
    }

    public function edit(Torneio $torneio)
    {
        return view('torneios.edit', compact('torneio'));
    }

    public function update(Request $request, Torneio $torneio)
    {
        $torneio->update([
            'titulo' => $request->titulo,
            'premio' => $request->premio,
            'data_evento' => $request->data_evento,
        ]);

        return redirect()->route('torneios.index')->with('success', 'atualizado com sucesso');
    }

    public function destroy(Torneio $torneio)
    {
        $torneio->delete();

        return redirect()->route('torneios.index')->with('success', 'deletado com sucesso');
    }
}