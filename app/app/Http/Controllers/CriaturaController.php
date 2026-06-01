<?php
namespace App\Http\Controllers;
use App\Models\Criatura;
use Illuminate\Http\Request;

class CriaturaController extends Controller
{
    public function index()
    {
        $criaturas = Criatura::all();
        return view('criatura.index', compact('criaturas'));
    }
    public function create()
    {
        return view('criatura.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nombre_criatura' => 'required|string|max:255']);
        Criatura::create($request->all());
        return redirect()->route('criatura.index')->with('success', 'Criatura creada correctamente');
    }
    public function edit(Criatura $criatura)
    {
        return view('criatura.edit', compact('criatura'));
    }
    public function update(Request $request, Criatura $criatura)
    {
        $request->validate(['nombre_criatura' => 'required|string|max:255']);
        $criatura->update($request->all());
        return redirect()->route('criatura.index')->with('success', 'Criatura actualizada correctamente');
    }
    public function destroy(Criatura $criatura)
    {
        $criatura->delete();
        return redirect()->route('criatura.index')->with('success', 'Criatura eliminada correctamente');
    }
}