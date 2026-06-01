<?php

namespace App\Http\Controllers;

use App\Models\Dominio;
use Illuminate\Http\Request;

class DominioController extends Controller
{
    public function index()
    {
        $dominios = Dominio::all();
        return view('dominios.index', compact('dominios'));
    }

    public function create()
    {
        return view('dominios.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre_dominio' => 'required|string|max:255|unique:dominios,nombre_dominio']);
        Dominio::create($request->all());
        return redirect()->route('dominios.index')->with('success', 'Dominio agregado correctamente');
    }

    public function destroy(Dominio $dominio)
    {
        $dominio->delete();
        return redirect()->route('dominios.index')->with('success', 'Dominio eliminado correctamente');
    }
}