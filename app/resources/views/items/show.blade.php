<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Nombre</label>
                    <p class="text-lg font-semibold">{{ $item->nombre_item }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Descripción</label>
                    <p>{{ $item->descripcion }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Stack Máximo</label>
                    <p>{{ $item->stack_maximo }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Rareza</label>
                    <p>{{ $item->rareza->nombre_rareza ?? '-' }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Categoría</label>
                    <p>{{ $item->categoria->nombre_categoria ?? '-' }}</p>
                </div>

                <a href="{{ route('items.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>