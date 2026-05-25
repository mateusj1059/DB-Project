<?php

namespace App\Http\Controllers;

use App\Models\Rareza;
use Illuminate\Http\Request;

class RarezaController extends Controller
{
    public function index()
    {
        $rarezas = Rareza::all();
        return view('rareza.index', compact('rarezas'));
    }

    public function create()
    {
        return view('rareza.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre_rareza' => 'required|string|max:255']);
        Rareza::create($request->all());
        return redirect()->route('rareza.index')->with('success', 'Rareza creada correctamente');
    }

    public function show(Rareza $rareza)
    {
        return view('rareza.show', compact('rareza'));
    }

    public function edit(Rareza $rareza)
    {
        return view('rareza.edit', compact('rareza'));
    }

    public function update(Request $request, Rareza $rareza)
    {
        $request->validate(['nombre_rareza' => 'required|string|max:255']);
        $rareza->update($request->all());
        return redirect()->route('rareza.index')->with('success', 'Rareza actualizada correctamente');
    }

    public function destroy(Rareza $rareza)
    {
        $rareza->delete();
        return redirect()->route('rareza.index')->with('success', 'Rareza eliminada correctamente');
    }
}