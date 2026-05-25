<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Rareza</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('rareza.update', $rareza->id_rareza) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Nombre Rareza</label>
                        <input type="text" name="nombre_rareza" value="{{ old('nombre_rareza', $rareza->nombre_rareza) }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
                        <a href="{{ route('rareza.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>