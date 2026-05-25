<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="{{ route('items.index') }}"
                   class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">🗡️ Items</h3>
                    <p class="text-gray-500 text-sm">Ver, crear, editar y eliminar items del juego.</p>
                </a>

                <a href="{{ route('categorias.index') }}"
                   class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">📂 Categorías</h3>
                    <p class="text-gray-500 text-sm">Gestiona las categorías de los items.</p>
                </a>

                <a href="{{ route('rareza.index') }}"
                   class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">✨ Rareza</h3>
                    <p class="text-gray-500 text-sm">Administra los niveles de rareza.</p>
                </a>

                <a href="{{ route('inventario.index') }}"
                   class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">🎒 Inventario</h3>
                    <p class="text-gray-500 text-sm">Consulta y gestiona el inventario de usuarios.</p>
                </a>

                <a href="{{ route('recetas.index') }}"
                   class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">⚗️ Recetas de Crafteo</h3>
                    <p class="text-gray-500 text-sm">Administra las recetas para craftear items.</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>