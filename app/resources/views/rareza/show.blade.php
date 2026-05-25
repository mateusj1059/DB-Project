<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalle Rareza</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Nombre</label>
                    <p class="text-lg font-semibold">{{ $rareza->nombre_rareza }}</p>
                </div>
                <a href="{{ route('rareza.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>