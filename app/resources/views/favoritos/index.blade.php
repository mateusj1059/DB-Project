<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Favoritos</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @hasrole('superadmin|admin')
                <a href="{{ route('favoritos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Nuevo Favorito</a>
                @endhasrole
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Usuario</th>
                            <th class="border border-gray-300 p-2">Item</th>
                            <th class="border border-gray-300 p-2">Fecha</th>
                            <th class="border border-gray-300 p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($favoritos as $favorito)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $favorito->id_favoritos }}</td>
                            <td class="border border-gray-300 p-2">{{ $favorito->usuario->name ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $favorito->item->nombre_item ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $favorito->fecha_agregado }}</td>
                            <td class="border border-gray-300 p-2">
                                @hasrole('superadmin|admin')
                                <a href="{{ route('favoritos.edit', $favorito->id_favoritos) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Editar</a>
                                <form action="{{ route('favoritos.destroy', $favorito->id_favoritos) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                                @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center p-4 text-gray-500">No hay favoritos</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>