<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with(['usuario', 'item'])->get();
        return view('inventario.index', compact('inventarios'));
    }

    public function create()
    {
        $items = Item::all();
        $usuarios = User::all();
        return view('inventario.create', compact('items', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_item'    => 'required|exists:items,id_item',
            'cantidad'   => 'required|integer|min:1',
        ]);
        Inventario::create($request->all());
        return redirect()->route('inventario.index')->with('success', 'Registro creado correctamente');
    }

    public function show(Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $items = Item::all();
        $usuarios = User::all();
        return view('inventario.edit', compact('inventario', 'items', 'usuarios'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_item'    => 'required|exists:items,id_item',
            'cantidad'   => 'required|integer|min:1',
        ]);
        $inventario->update($request->all());
        return redirect()->route('inventario.index')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventario.index')->with('success', 'Registro eliminado correctamente');
    }
}