<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parametros') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Editar Parámetro</h1>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <h>Kilometros a los que hacerse el mantenimiento</h>
                        </div>

                        <div class="mb-4">
                            <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                            <p>{{ $parameters->value }}</p>                        
                        </div>
                        <a href="{{ route('editParameters', $parameters->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Editar
                        </a>
                </div>
            </div>
    </x-app-layout>