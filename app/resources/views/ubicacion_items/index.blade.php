<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ubicaciones de Items</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @hasrole('superadmin|admin')
                <a href="{{ route('ubicacion_items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Nueva Ubicación</a>
                @endhasrole
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Capa Min</th>
                            <th class="border border-gray-300 p-2">Capa Max</th>
                            <th class="border border-gray-300 p-2">Bioma</th>
                            <th class="border border-gray-300 p-2">Estructura</th>
                            <th class="border border-gray-300 p-2">Criatura</th>
                            <th class="border border-gray-300 p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ubicaciones as $ubicacion)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->id_ubicacion }}</td>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->capa_min }}</td>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->capa_max }}</td>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->bioma->nombre_bioma ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->estructura->nombre_estructura ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $ubicacion->criatura->nombre_criatura ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">
                                @hasrole('superadmin|admin')
                                <a href="{{ route('ubicacion_items.edit', $ubicacion->id_ubicacion) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Editar</a>
                                <form action="{{ route('ubicacion_items.destroy', $ubicacion->id_ubicacion) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                                @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="text-center p-4 text-gray-500">No hay ubicaciones</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>