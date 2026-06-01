<?php
namespace App\Http\Controllers;
use App\Models\UbicacionItems;
use App\Models\Bioma;
use App\Models\Estructura;
use App\Models\Criatura;
use Illuminate\Http\Request;

class UbicacionItemsController extends Controller
{
    public function index()
    {
        $ubicaciones = UbicacionItems::with(['bioma', 'estructura', 'criatura'])->get();
        return view('ubicacion_items.index', compact('ubicaciones'));
    }
    public function create()
    {
        $biomas = Bioma::all();
        $estructuras = Estructura::all();
        $criaturas = Criatura::all();
        return view('ubicacion_items.create', compact('biomas', 'estructuras', 'criaturas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'capa_min'      => 'required|integer',
            'capa_max'      => 'required|integer',
            'id_bioma'      => 'required|exists:bioma,id_bioma',
            'id_estructura' => 'required|exists:estructura,id_estructura',
            'id_criatura'   => 'required|exists:criatura,id_criatura',
        ]);
        UbicacionItems::create($request->all());
        return redirect()->route('ubicacion_items.index')->with('success', 'Ubicación creada correctamente');
    }
    public function edit(UbicacionItems $ubicacion_item)
    {
        $biomas = Bioma::all();
        $estructuras = Estructura::all();
        $criaturas = Criatura::all();
        return view('ubicacion_items.edit', compact('ubicacion_item', 'biomas', 'estructuras', 'criaturas'));
    }
    public function update(Request $request, UbicacionItems $ubicacion_item)
    {
        $request->validate([
            'capa_min'      => 'required|integer',
            'capa_max'      => 'required|integer',
            'id_bioma'      => 'required|exists:bioma,id_bioma',
            'id_estructura' => 'required|exists:estructura,id_estructura',
            'id_criatura'   => 'required|exists:criatura,id_criatura',
        ]);
        $ubicacion_item->update($request->all());
        return redirect()->route('ubicacion_items.index')->with('success', 'Ubicación actualizada correctamente');
    }
    public function destroy(UbicacionItems $ubicacion_item)
    {
        $ubicacion_item->delete();
        return redirect()->route('ubicacion_items.index')->with('success', 'Ubicación eliminada correctamente');
    }
}