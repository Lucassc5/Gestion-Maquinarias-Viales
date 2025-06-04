<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewProject')}}">Atras</a>

                        <form action="{{ route('updateProject', $projects->id) }}" method="POST">
                        @csrf
                            @method('PUT')
                        
                            <div>
                                <input type="text" name="project_name" id="project_name"
                                    value="{{ $projects->project_name }}"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="province" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Razon de Fin</label>
                                <select name="province_id" id="province_id"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Selecciona Provincia</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ $projects->province_id == $province->id ? 'selected' : '' }}>
                                            {{ $province->province_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <input type="date" name="planned_start_date" id="planned_start_date"
                                    value="{{ $projects->planned_start_date }}"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            
                            <div>
                                <input type="date" name="planned_end_date" id="planned_end_date"
                                    value="{{ $projects->planned_end_date }}"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Actualizar Proyecto
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
