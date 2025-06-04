<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Maquinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('createMachine') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Crear Maquinas
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Numero de Serie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Modelo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kilometros</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($machine as $m)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $m->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $m->serial_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $m->Type->type_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $m->model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $m->kilometers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex gap-2">
                                            <a href="{{ route('editMachine', $m->id) }}"
                                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <form action="{{ route('deleteMachine', $m->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit"
                                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $machine->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
