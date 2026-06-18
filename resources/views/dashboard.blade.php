<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                    <div>
                        <span class="font-medium text-lg">{{ __("¡Sesión Iniciada de forma segura!") }}</span>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Listo para gestionar la landing page.</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">
                        Admin Root
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700 flex flex-col justify-between p-6">
                    <div>
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-yellow-50 dark:bg-yellow-900/30 mb-4">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Catálogo de Productos</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Controla el menú del restaurante. Añade nuevos productos bases y define si actúan como Platillos individuales/combos o como Promociones temporales.
                        </p>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 font-semibold text-sm rounded-lg hover:bg-gray-800 dark:hover:bg-gray-200 transition-colors duration-200">
                            Gestionar Productos
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700 flex flex-col justify-between p-6">
                    <div>
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-red-50 dark:bg-red-900/30 mb-4">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Carrouseles</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Administra los contenedores que se muestran al presionar los platillos en la landing. Configura los titulos y enlaza múltiples productos de forma masiva a un solo carrusel.
                        </p>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 font-semibold text-sm rounded-lg hover:bg-gray-800 dark:hover:bg-gray-200 transition-colors duration-200">
                            Gestionar Carrouseles
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
