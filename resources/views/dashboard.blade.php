<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido al Sistema de Maquinarias Viales") }}
                </div>
            </div>
        </div>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ __("Descripcion del sistema") }}</h1>
                    <p>Sistema web desarrollado con Laravel para la gestión de maquinaria vial. Permite administrar máquinas, asignarlas a proyectos, registrar mantenimientos, calcular kilómetros recorridos y generar alertas automáticas cuando una máquina supera cierto límite de uso.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
