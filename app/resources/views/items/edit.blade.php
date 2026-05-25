<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('items.update', $item->id_item) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Nombre Item</label>
                        <input type="text" name="nombre_item" value="{{ old('nombre_item', $item->nombre_item) }}"
                               class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Descripción</label>
                        <textarea name="descripcion"
                                  class="w-full border border-gray-300 rounded p-2">{{ old('descripcion', $item->descripcion) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Stack Máximo</label>
                        <input type="number" name="stack_maximo" value="{{ old('stack_maximo', $item->stack_maximo) }}"
                               class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Rareza</label>
                        <select name="id_rareza" class="w-full border border-gray-300 rounded p-2">
                            <option value="">Selecciona una rareza</option>
                            @foreach($rarezas as $rareza)
                                <option value="{{ $rareza->id_rareza }}"
                                    {{ $item->id_rareza == $rareza->id_rareza ? 'selected' : '' }}>
                                    {{ $rareza->nombre_rareza }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Categoría</label>
                        <select name="id_categoria" class="w-full border border-gray-300 rounded p-2">
                            <option value="">Selecciona una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}"
                                    {{ $item->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                                    {{ $categoria->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded">
                            Actualizar
                        </button>
                        <a href="{{ route('items.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>