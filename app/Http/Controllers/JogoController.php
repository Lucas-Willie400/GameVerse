<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();

        return view('jogos.index', compact('jogos'));
    }

    public function create()
    {
        return view('jogos.create');
    }

    public function store(Request $request)
    {
        Jogo::create([
            'nome' => $request->nome,
            'genero' => $request->genero,
            'preco' => $request->preco,
        ]);

        return redirect()->route('jogos.index');
    }

    public function edit(Jogo $jogo)
    {
        return view('jogos.edit', compact('jogo'));
    }

    public function update(Request $request, Jogo $jogo)
    {
        $jogo->update([
            'nome' => $request->nome,
            'genero' => $request->genero,
            'preco' => $request->preco,
        ]);

        return redirect()->route('jogos.index');
    }

    public function destroy(Jogo $jogo)
    {
        $jogo->delete();

        return redirect()->route('jogos.index');
    }
}