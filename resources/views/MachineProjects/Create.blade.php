<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assignment Machine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{Route('viewProjectMachine')}}">Atras</a>

                        <form action="{{ route('storeProjectMachine') }}" method="POST">
                        @csrf

                        <div>
                            <h2>Date Start</h2>
                            <input type="date" name="start_date" id="start_date"
                                   class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   placeholder="Start Date" required>
                                   @if ($errors->any())
                                    <div style="color: red;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                        </div>

                        <div>
                            <label for="project" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                                <select name="project_id" id="project_id"
                                        class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="" disabled selected>Proyectos Activos</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }} </option>
                                    @endforeach
                                </select required>
                        </div> 

                        <div>
                            <label for="machine" class="block text-sm font-medium text-gray-700 dark:text-gray-300"></label>
                            <select name="machine_id" id="machine_id"
                                    class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Maquinas disponibles</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id}}">{{ $machine->serial_number }} </option>
                                @endforeach
                            </select>

                            
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Save Machine Project</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
