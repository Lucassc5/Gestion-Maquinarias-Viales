<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Finalize Machine Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewProjectMachine')}}">Atras</a>

                        <form action="{{ route('finalizeUpdateProjectMachine', $machineProjects->id) }}" method="POST">
                        @csrf
                            @method('PUT')
                        
                            <div>
                                <h2>Fecha de fin</h2>
                                <input type="date" name="end_date" id="end_date"
                                    value="{{ $machineProjects->end_date }}"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="reason_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason End</label>
                                <select name="reason_id" id="reason_id"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Select Reason</option>
                                    @foreach ($reason as $reasons)
                                        <option value="{{ $reasons->id }}" {{ $machineProjects->reason_id == $reasons->id ? 'selected' : '' }}>
                                            {{ $reasons->name_reason }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <h2>Kilometros hechos con la maquina</h2>
                                <input type="number" name="kilometers" id="kilometers"
                                    value="{{ $machineProjects->kilometers }}"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Finalize Project
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
