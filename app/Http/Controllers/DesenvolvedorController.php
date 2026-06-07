<?php

namespace App\Http\Controllers;

use App\Models\Desenvolvedor;
use Illuminate\Http\Request;

class DesenvolvedorController extends Controller
{
    public function index()
    {
        $desenvolvedores = Desenvolvedor::all();

        return view('desenvolvedores.index', compact('desenvolvedores'));
    }

    public function create()
    {
        return view('desenvolvedores.create');
    }

    public function store(Request $request)
    {
        Desenvolvedor::create($request->all());

        return redirect()->route('desenvolvedores.index');
    }

    public function edit(Desenvolvedor $desenvolvedore)
    {
        return view('desenvolvedores.edit', [
            'desenvolvedor' => $desenvolvedore
        ]);
    }

    public function update(Request $request, Desenvolvedor $desenvolvedore)
    {
        $desenvolvedore->update($request->all());

        return redirect()->route('desenvolvedores.index');
    }

    public function destroy(Desenvolvedor $desenvolvedore)
    {
        $desenvolvedore->delete();

        return redirect()->route('desenvolvedores.index');
    }
}