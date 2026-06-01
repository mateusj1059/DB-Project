<?php
namespace App\Http\Controllers;
use App\Models\HistorialBusqueda;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class HistorialBusquedaController extends Controller
{
    public function index()
    {
        $historiales = HistorialBusqueda::with(['usuario', 'item'])->get();
        return view('historial_busqueda.index', compact('historiales'));
    }
    public function create()
    {
        $usuarios = User::all();
        $items = Item::all();
        return view('historial_busqueda.create', compact('usuarios', 'items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'resultado_busqueda' => 'required|string|max:255',
            'fecha_busqueda'     => 'required|date',
            'id_usuario'         => 'required|exists:users,id',
            'id_item'            => 'required|exists:items,id_item',
        ]);
        HistorialBusqueda::create($request->all());
        return redirect()->route('historial_busqueda.index')->with('success', 'Historial creado correctamente');
    }
    public function edit(HistorialBusqueda $historial_busqueda)
    {
        $usuarios = User::all();
        $items = Item::all();
        return view('historial_busqueda.edit', compact('historial_busqueda', 'usuarios', 'items'));
    }
    public function update(Request $request, HistorialBusqueda $historial_busqueda)
    {
        $request->validate([
            'resultado_busqueda' => 'required|string|max:255',
            'fecha_busqueda'     => 'required|date',
            'id_usuario'         => 'required|exists:users,id',
            'id_item'            => 'required|exists:items,id_item',
        ]);
        $historial_busqueda->update($request->all());
        return redirect()->route('historial_busqueda.index')->with('success', 'Historial actualizado correctamente');
    }
    public function destroy(HistorialBusqueda $historial_busqueda)
    {
        $historial_busqueda->delete();
        return redirect()->route('historial_busqueda.index')->with('success', 'Historial eliminado correctamente');
    }
}