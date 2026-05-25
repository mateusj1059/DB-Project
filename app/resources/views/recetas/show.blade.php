<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalle Receta</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Item</label>
                    <p class="text-lg font-semibold">{{ $receta->item->nombre_item ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Cantidad</label>
                    <p class="text-lg font-semibold">{{ $receta->cantidad }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Posición</label>
                    <p class="text-lg font-semibold">{{ $receta->posicion }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-500 text-sm">Mesa de Trabajo</label>
                    <p class="text-lg font-semibold">{{ $receta->nombre_mesa }}</p>
                </div>
                <a href="{{ route('recetas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>