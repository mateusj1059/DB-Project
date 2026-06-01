<?php
namespace App\Http\Controllers;
use App\Models\MesaTrabajo;
use Illuminate\Http\Request;

class MesaTrabajoController extends Controller
{
    public function index()
    {
        $mesas = MesaTrabajo::all();
        return view('mesa_trabajo.index', compact('mesas'));
    }
    public function create()
    {
        return view('mesa_trabajo.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nombre_mesa' => 'required|string|max:255']);
        MesaTrabajo::create($request->all());
        return redirect()->route('mesa_trabajo.index')->with('success', 'Mesa de trabajo creada correctamente');
    }
    public function edit(MesaTrabajo $mesa_trabajo)
    {
        return view('mesa_trabajo.edit', compact('mesa_trabajo'));
    }
    public function update(Request $request, MesaTrabajo $mesa_trabajo)
    {
        $request->validate(['nombre_mesa' => 'required|string|max:255']);
        $mesa_trabajo->update($request->all());
        return redirect()->route('mesa_trabajo.index')->with('success', 'Mesa de trabajo actualizada correctamente');
    }
    public function destroy(MesaTrabajo $mesa_trabajo)
    {
        $mesa_trabajo->delete();
        return redirect()->route('mesa_trabajo.index')->with('success', 'Mesa de trabajo eliminada correctamente');
    }
}