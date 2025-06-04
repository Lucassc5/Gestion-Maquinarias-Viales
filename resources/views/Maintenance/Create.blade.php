<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assingmente Maintenance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewMaintenance')}}">Atras</a>

                        <form action="{{ route('storeMaintenance') }}" method="POST">
                        @csrf

                        <div>
                            <label for="machine_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <select name="machine_id" id="machine_id"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Selecciona una Maquina</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id}}">{{ $machine->serial_number }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="maintenance_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <h2>Fecha del Mantenimiento</h2>
                            <input type="date" name="maintenance_date" id="maintenance_date" maxlength="4" 
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>


                        <div>
                            <label for="maintenance_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="text" name="maintenance_type" id="maintenance_type" placeholder="Type Maintenance"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="kilometers" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="number" name="kilometers" id="kilometers" placeholder="Kilometers"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Guardar Mantenimiento</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
