<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @can('role:superadmin|admin')
                <a href="{{ route('items.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Nuevo Item
                </a>
                @endcan

                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Nombre</th>
                            <th class="border border-gray-300 p-2">Descripción</th>
                            <th class="border border-gray-300 p-2">Stack Máximo</th>
                            <th class="border border-gray-300 p-2">Rareza</th>
                            <th class="border border-gray-300 p-2">Categoría</th>
                            <th class="border border-gray-300 p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $item->id_item }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->nombre_item }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->descripcion }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->stack_maximo }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->rareza->nombre_rareza ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->categoria->nombre_categoria ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">
                                <a href="{{ route('items.show', $item->id_item) }}"
                                   class="bg-gray-500 text-white px-2 py-1 rounded text-sm">Ver</a>
                                @hasrole('superadmin|admin')
                                <a href="{{ route('items.edit', $item->id_item) }}"
                                   class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Editar</a>
                                <form action="{{ route('items.destroy', $item->id_item) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded text-sm"
                                            onclick="return confirm('¿Eliminar este item?')">
                                        Eliminar
                                    </button>
                                </form>
                                @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center p-4 text-gray-500">No hay items registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>