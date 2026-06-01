<?php
namespace App\Http\Controllers;
use App\Models\Favoritos;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    public function index()
    {
        $favoritos = Favoritos::with(['usuario', 'item'])->get();
        return view('favoritos.index', compact('favoritos'));
    }
    public function create()
    {
        $usuarios = User::all();
        $items = Item::all();
        return view('favoritos.create', compact('usuarios', 'items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'fecha_agregado' => 'required|date',
            'id_usuario'     => 'required|exists:users,id',
            'id_item'        => 'required|exists:items,id_item',
        ]);
        Favoritos::create($request->all());
        return redirect()->route('favoritos.index')->with('success', 'Favorito agregado correctamente');
    }
    public function edit(Favoritos $favorito)
    {
        $usuarios = User::all();
        $items = Item::all();
        return view('favoritos.edit', compact('favorito', 'usuarios', 'items'));
    }
    public function update(Request $request, Favoritos $favorito)
    {
        $request->validate([
            'fecha_agregado' => 'required|date',
            'id_usuario'     => 'required|exists:users,id',
            'id_item'        => 'required|exists:items,id_item',
        ]);
        $favorito->update($request->all());
        return redirect()->route('favoritos.index')->with('success', 'Favorito actualizado correctamente');
    }
    public function destroy(Favoritos $favorito)
    {
        $favorito->delete();
        return redirect()->route('favoritos.index')->with('success', 'Favorito eliminado correctamente');
    }
}