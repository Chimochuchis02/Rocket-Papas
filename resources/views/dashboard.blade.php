<x-app-layout>

    <div class="bg-gray-100 dark:bg-gray-950 h-[calc(100vh-65px)] flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center justify-center">

                <a href="{{ route('productos.create') }}" class="group block">
                    <div
                        class="bg-blue-600 hover:bg-blue-500 text-white p-8 rounded-2xl shadow-lg transition-all duration-300 transform group-hover:-translate-y-2 group-hover:shadow-2xl flex flex-col items-center justify-center text-center border border-blue-700 h-64">
                        <div class="mb-2 text-white opacity-90">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black uppercase tracking-wide">Productos</h3>
                        <p class="text-sm mt-2 opacity-80">Registrar o administrar el inventario de platillos y
                            promociones</p>
                    </div>
                </a>

                <a href="{{ route('carrouseles.create') }}" class="group block">
                    <div
                        class="bg-emerald-600 hover:bg-emerald-500 text-white p-8 rounded-2xl shadow-lg transition-all duration-300 transform group-hover:-translate-y-2 group-hover:shadow-2xl flex flex-col items-center justify-center text-center border border-emerald-700 h-64">
                        <div class="mb-4 text-white opacity-90">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black uppercase tracking-wide">Carrouseles</h3>
                        <p class="text-sm mt-2 opacity-80">Modificar los diseños dinámicos de los banners y la landing
                            page</p>
                    </div>
                </a>

            </div>

        </div>
    </div>

</x-app-layout>