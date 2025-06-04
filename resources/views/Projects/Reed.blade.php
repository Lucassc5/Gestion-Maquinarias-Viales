<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-6">
                <a href="{{ route('createProject') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Crear Proyectos
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Provincia</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Inicio del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Fin del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->project_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->province->province_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->planned_start_date}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->planned_end_date}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex gap-2">
                                            <a href="{{ route('editProject', $project->id) }}"
                                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <form action="{{ route('deleteProject', $project->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
