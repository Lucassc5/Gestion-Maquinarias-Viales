<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Machine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewMachine')}}">Atras</a>

                        <form action="{{ route('updateMachine', $machine->id) }}" method="POST">
                        @csrf
                            @method('PUT')
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="text" name="serial_number" id="serial_number" maxlength="4" value="{{ $machine->serial_number }}"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <select name="type" id="type"
                                class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled>Tipo de Maquinas</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $machine->type ? 'selected' : '' }}>
                                        {{ $type->type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <input type="number" name="model" id="model" maxlength="4" value="{{ $machine->model }}"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Guardar Máquina</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
