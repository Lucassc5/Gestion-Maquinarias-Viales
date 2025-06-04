<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('createProjectMachine') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Asignar Máquinas a trabajos
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700"> Maquinas Asignadas
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Inicio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Razon de Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kilometros</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Provincia</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tipos de Maquinas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($assignedMachines as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->end_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $project->reason ? $project->reason->name_reason : '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->kilometers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->project->project_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->project->province->province_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->machine->serial_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('editProjectMachine', $project->id) }}"
                                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <a href="{{ route('finalizeProjectMachine', $project->id) }}"
                                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                                Finalizar 
                                            </a>
                                            <form action="{{ route('deleteProjectMachine', $project->id) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <a href="{{ route('exportar.maquinas.asignadas') }}"
                            class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Exportar Máquinas Asignadas
                        </a>
                    <div class="mt-4">
                        {{ $assignedMachines->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700"> Maquinas Con Trabajo Finalizado
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Inicio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Razon de Fin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kilometros</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Provincia</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tipos de Maquinas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($unassignedMachines as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->end_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $project->reason ? $project->reason->name_reason : '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->kilometers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->project->project_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->project->province->province_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $project->machine->serial_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('editProjectMachine', $project->id) }}"
                                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('deleteProjectMachine', $project->id) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $unassignedMachines->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
