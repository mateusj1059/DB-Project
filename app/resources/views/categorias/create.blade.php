<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Categoría</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('categorias.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Nombre Categoría</label>
                        <input type="text" name="nombre_categoria" value="{{ old('nombre_categoria') }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('categorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>