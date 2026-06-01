<?php
namespace App\Http\Controllers;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::all();
        return view('imagen.index', compact('imagenes'));
    }
    public function create()
    {
        return view('imagen.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'clave' => 'required|string|max:255',
            'campo' => 'required|string|max:255',
            'tipo'  => 'required|string|max:255',
        ]);
        Imagen::create($request->all());
        return redirect()->route('imagen.index')->with('success', 'Imagen creada correctamente');
    }
    public function edit(Imagen $imagen)
    {
        return view('imagen.edit', compact('imagen'));
    }
    public function update(Request $request, Imagen $imagen)
    {
        $request->validate([
            'clave' => 'required|string|max:255',
            'campo' => 'required|string|max:255',
            'tipo'  => 'required|string|max:255',
        ]);
        $imagen->update($request->all());
        return redirect()->route('imagen.index')->with('success', 'Imagen actualizada correctamente');
    }
    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
        return redirect()->route('imagen.index')->with('success', 'Imagen eliminada correctamente');
    }
}