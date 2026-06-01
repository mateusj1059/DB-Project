<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignar Rol a {{ $usuario->name }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <p class="mb-2 text-gray-600">Correo: <strong>{{ $usuario->email }}</strong></p>
                <p class="mb-4 text-gray-600">Rol actual: <strong>{{ $usuario->roles->pluck('name')->join(', ') ?: 'Sin rol' }}</strong></p>

                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Selecciona un rol</label>
                        <select name="role" class="w-full border border-gray-300 rounded p-2">
                            @foreach($roles as $rol)
                                <option value="{{ $rol->name }}"
                                    {{ $usuario->hasRole($rol->name) ? 'selected' : '' }}>
                                    {{ ucfirst($rol->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>