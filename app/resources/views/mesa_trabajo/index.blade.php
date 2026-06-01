<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mesas de Trabajo</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @hasrole('superadmin|admin')
                <a href="{{ route('mesa_trabajo.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Nueva Mesa</a>
                @endhasrole
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Nombre</th>
                            <th class="border border-gray-300 p-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mesas as $mesa)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $mesa->id_mesa }}</td>
                            <td class="border border-gray-300 p-2">{{ $mesa->nombre_mesa }}</td>
                            <td class="border border-gray-300 p-2">
                                @hasrole('superadmin|admin')
                                <a href="{{ route('mesa_trabajo.edit', $mesa->id_mesa) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Editar</a>
                                <form action="{{ route('mesa_trabajo.destroy', $mesa->id_mesa) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                                @endhasrole
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center p-4 text-gray-500">No hay mesas de trabajo</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>