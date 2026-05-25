<?php

namespace App\Http\Controllers;

use App\Models\RecetaCrafteo;
use App\Models\Item;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = RecetaCrafteo::with('item')->get();
        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        $items = Item::all();
        return view('recetas.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_item'    => 'required|exists:items,id_item',
            'cantidad'   => 'required|integer|min:1',
            'posicion'   => 'required|string|max:255',
            'nombre_mesa'=> 'required|string|max:255',
        ]);
        RecetaCrafteo::create($request->all());
        return redirect()->route('recetas.index')->with('success', 'Receta creada correctamente');
    }

    public function show(RecetaCrafteo $receta)
    {
        return view('recetas.show', compact('receta'));
    }

    public function edit(RecetaCrafteo $receta)
    {
        $items = Item::all();
        return view('recetas.edit', compact('receta', 'items'));
    }

    public function update(Request $request, RecetaCrafteo $receta)
    {
        $request->validate([
            'id_item'    => 'required|exists:items,id_item',
            'cantidad'   => 'required|integer|min:1',
            'posicion'   => 'required|string|max:255',
            'nombre_mesa'=> 'required|string|max:255',
        ]);
        $receta->update($request->all());
        return redirect()->route('recetas.index')->with('success', 'Receta actualizada correctamente');
    }

    public function destroy(RecetaCrafteo $receta)
    {
        $receta->delete();
        return redirect()->route('recetas.index')->with('success', 'Receta eliminada correctamente');
    }
}