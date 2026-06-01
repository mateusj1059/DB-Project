<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Historial</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('historial_busqueda.update', $historial_busqueda->id_historial) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Resultado Búsqueda</label>
                        <input type="text" name="resultado_busqueda" value="{{ old('resultado_busqueda', $historial_busqueda->resultado_busqueda) }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Fecha</label>
                        <input type="date" name="fecha_busqueda" value="{{ old('fecha_busqueda', $historial_busqueda->fecha_busqueda) }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Usuario</label>
                        <select name="id_usuario" class="w-full border border-gray-300 rounded p-2">
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ $historial_busqueda->id_usuario == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Item</label>
                        <select name="id_item" class="w-full border border-gray-300 rounded p-2">
                            @foreach($items as $item)
                                <option value="{{ $item->id_item }}" {{ $historial_busqueda->id_item == $item->id_item ? 'selected' : '' }}>{{ $item->nombre_item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
                        <a href="{{ route('historial_busqueda.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>