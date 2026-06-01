<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Dominio</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                    </div>
                @endif
                <p class="text-gray-600 mb-4">Ingresa solo el dominio, sin el @. Ejemplo: <strong>gmail.com</strong></p>
                <form method="POST" action="{{ route('dominios.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Nombre del Dominio</label>
                        <input type="text" name="nombre_dominio" value="{{ old('nombre_dominio') }}"
                               placeholder="gmail.com"
                               class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('dominios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>