<?php
namespace App\Http\Controllers;
use App\Models\Estructura;
use Illuminate\Http\Request;

class EstructuraController extends Controller
{
    public function index()
    {
        $estructuras = Estructura::all();
        return view('estructura.index', compact('estructuras'));
    }
    public function create()
    {
        return view('estructura.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nombre_estructura' => 'required|string|max:255']);
        Estructura::create($request->all());
        return redirect()->route('estructura.index')->with('success', 'Estructura creada correctamente');
    }
    public function edit(Estructura $estructura)
    {
        return view('estructura.edit', compact('estructura'));
    }
    public function update(Request $request, Estructura $estructura)
    {
        $request->validate(['nombre_estructura' => 'required|string|max:255']);
        $estructura->update($request->all());
        return redirect()->route('estructura.index')->with('success', 'Estructura actualizada correctamente');
    }
    public function destroy(Estructura $estructura)
    {
        $estructura->delete();
        return redirect()->route('estructura.index')->with('success', 'Estructura eliminada correctamente');
    }
}