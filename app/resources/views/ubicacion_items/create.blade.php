<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Ubicación</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('ubicacion_items.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Capa Mínima</label>
                        <input type="number" name="capa_min" value="{{ old('capa_min') }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Capa Máxima</label>
                        <input type="number" name="capa_max" value="{{ old('capa_max') }}" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Bioma</label>
                        <select name="id_bioma" class="w-full border border-gray-300 rounded p-2">
                            <option value="">Selecciona un bioma</option>
                            @foreach($biomas as $bioma)
                                <option value="{{ $bioma->id_bioma }}">{{ $bioma->nombre_bioma }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Estructura</label>
                        <select name="id_estructura" class="w-full border border-gray-300 rounded p-2">
                            <option value="">Selecciona una estructura</option>
                            @foreach($estructuras as $estructura)
                                <option value="{{ $estructura->id_estructura }}">{{ $estructura->nombre_estructura }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Criatura</label>
                        <select name="id_criatura" class="w-full border border-gray-300 rounded p-2">
                            <option value="">Selecciona una criatura</option>
                            @foreach($criaturas as $criatura)
                                <option value="{{ $criatura->id_criatura }}">{{ $criatura->nombre_criatura }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('ubicacion_items.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>