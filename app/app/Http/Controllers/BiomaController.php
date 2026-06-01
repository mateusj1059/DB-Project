<?php
namespace App\Http\Controllers;
use App\Models\Bioma;
use Illuminate\Http\Request;

class BiomaController extends Controller
{
    public function index()
    {
        $biomas = Bioma::all();
        return view('bioma.index', compact('biomas'));
    }
    public function create()
    {
        return view('bioma.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nombre_bioma' => 'required|string|max:255']);
        Bioma::create($request->all());
        return redirect()->route('bioma.index')->with('success', 'Bioma creado correctamente');
    }
    public function edit(Bioma $bioma)
    {
        return view('bioma.edit', compact('bioma'));
    }
    public function update(Request $request, Bioma $bioma)
    {
        $request->validate(['nombre_bioma' => 'required|string|max:255']);
        $bioma->update($request->all());
        return redirect()->route('bioma.index')->with('success', 'Bioma actualizado correctamente');
    }
    public function destroy(Bioma $bioma)
    {
        $bioma->delete();
        return redirect()->route('bioma.index')->with('success', 'Bioma eliminado correctamente');
    }
}