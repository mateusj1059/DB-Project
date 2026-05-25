<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Categoria;
use App\Models\Rareza;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['rareza', 'categoria'])->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $rarezas = Rareza::all();
        return view('items.create', compact('categorias', 'rarezas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_item'  => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'stack_maximo' => 'required|integer|min:1',
            'id_rareza'    => 'required|exists:rareza,id_rareza',
            'id_categoria' => 'required|exists:categorias,id_categoria',
        ]);

        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item creado correctamente');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categorias = Categoria::all();
        $rarezas = Rareza::all();
        return view('items.edit', compact('item', 'categorias', 'rarezas'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nombre_item'  => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'stack_maximo' => 'required|integer|min:1',
            'id_rareza'    => 'required|exists:rareza,id_rareza',
            'id_categoria' => 'required|exists:categorias,id_categoria',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item actualizado correctamente');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item eliminado correctamente');
    }
}