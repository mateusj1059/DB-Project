<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Recetas de Crafteo</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @hasrole('superadmin|admin')
                <a href="{{ route('recetas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Nueva Receta</a>
                @endhasrole
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Item</th>
                            <th class="border border-gray-300 p-2">Cantidad</th>
                            <th class="border border-gray-300 p-2">Posición</th>
                            <th class="border border-gray-300 p-2">Mesa</th>
                            <th class="border border-gray-300 p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recetas as $receta)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $receta->id_receta }}</td>
                            <td class="border border-gray-300 p-2">{{ $receta->item->nombre_item ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $receta->cantidad }}</td>
                            <td class="border border-gray-300 p-2">{{ $receta->posicion }}</td>
                            <td class="border border-gray-300 p-2">{{ $receta->nombre_mesa }}</td>
                            <td class="border border-gray-300 p-2">
                                <a href="{{ route('recetas.show', $receta->id_receta) }}" class="bg-gray-500 text-white px-2 py-1 rounded text-sm">Ver</a>
                                @hasrole('superadmin|admin')
                                <a href="{{ route('recetas.edit', $receta->id_receta) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Editar</a>
                                <form action="{{ route('recetas.destroy', $receta->id_receta) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                                @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center p-4 text-gray-500">No hay recetas</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>