<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Parametros') }}
        </h2>
    </x-slot>
<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">Parámetros</h1>
                <form action="{{ route('updateParameters', $parameters->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <p>Kilometros a los que se hace el Mantenimiento</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                        <input type="text" name="value" id="value" value="{{ $parameters->value }}" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                    
                    <button type="submit"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar Parámetro
                    </button>
                </form>
            </div>
        </div>
</div>
</x-app-layout>