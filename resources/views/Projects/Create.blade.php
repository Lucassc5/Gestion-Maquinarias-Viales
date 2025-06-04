<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewProject')}}">Atras</a>

                        <form action="{{ route('storeProject') }}" method="POST">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="text" name="project_name" id="project_name" placeholder="Project Name"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <select name="province_id" id="province_id"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Provincias</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province_name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <h2>Fecha de Inicio</h2>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="date" name="planned_start_date" id="planned_start_date"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        
                        <div>
                            <h2>Fecha de Fin</h2>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="date" name="planned_end_date" id="planned_end_date"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Guardar Maquina</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
