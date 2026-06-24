<x-app-layout>
    <div class="flex justify-between items-center">
        <a href="{{ route('carrouseles.create') }}"
            class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg text-sm uppercase tracking-wider shadow-md transition duration-150">
            + Nuevo Banner
        </a>
    </div>

    <!-- Script de Google para el Visor 3D (Solo se activa si el carrusel tiene modelo) -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if($carrouseles->isEmpty())
                <div
                    class="text-center p-8 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <p class="text-white-500 dark:text-gray-400 font-medium">No hay carruseles registrados actualmente.</p>
                </div>
            @else
                @foreach($carrouseles as $carousel)
                    <!-- CONTENEDOR DEL ACORDEÓN INTERACTIVO CON ALPINE.JS -->
                    <div x-data="{ open: false }"
                        class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                        <!-- ENCABEZADO DEL ACORDEÓN (BOTÓN) -->
                        <button @click="open = !open" type="button"
                            class="w-full flex items-center justify-between p-5 text-left font-bold text-gray-800 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <span
                                    class="px-2.5 py-1 text-xs font-black uppercase rounded bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                                    ID: {{ $carousel->id }}
                                </span>
                                <span class="text-lg tracking-wide uppercase font-black">{{ $carousel->titulo }}</span>
                            </div>

                            <!-- Flecha indicadora con rotación animada -->
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- CONTENIDO DESPLEGABLE (TARJETA INTERNA) -->
                        <div x-show="open" x-collapse x-cloak
                            class="border-t border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/40 p-6">

                            <!-- Grid de 2 Columnas para separar Datos del Material Visual -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                                <!-- Columna Izquierda: Información -->
                                <div class="space-y-4">
                                    <div>
                                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block">Slug de la
                                            URL:</span>
                                        <code
                                            class="text-sm bg-gray-100 dark:bg-gray-950 px-2 py-1 rounded text-red-500 font-mono block mt-1 break-all">
                                                                                    {{ $carousel->slug }}
                                                                                </code>
                                    </div>

                                    <div>
                                        <span
                                            class="text-xs font-bold text-gray-400 uppercase tracking-widest block">Descripción
                                            Comercial:</span>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 font-medium leading-relaxed">
                                            {{ $carousel->desc ?? 'Sin descripción añadida.' }}
                                        </p>
                                    </div>

                                    <!-- Columna Derecha: Multimedia (Imágenes y Render 3D) -->
                                    <div class="space-y-5">

                                        <!-- Galería de imágenes (Recorriendo el JSON de imgs) -->
                                        <div>
                                            <span
                                                class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Imágenes
                                                del Carrusel:</span>
                                            <div class="grid grid-cols-3 gap-2">
                                                @if(is_array($carousel->imgs))
                                                    @foreach($carousel->imgs as $img)
                                                        <div
                                                            class="aspect-square bg-gray-200 dark:bg-gray-950 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-800">
                                                            <img src="{{ asset('storage/' . $img) }}" alt="Banner"
                                                                class="w-full h-full object-cover hover:scale-110 transition duration-200">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Renderizador 3D interactivo si contiene ruta de archivo -->
                                        @if($carousel->model_3d_path)
                                            <div>
                                                <span
                                                    class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2">Modelo
                                                    3D Interactivo:</span>
                                                <div
                                                    class="w-full h-48 bg-gray-100 dark:bg-gray-950 rounded-xl overflow-hidden relative border border-gray-200 dark:border-gray-800">
                                                    <model-viewer src="{{ asset('storage/' . $carousel->model_3d_path) }}"
                                                        alt="Modelo 3D" auto-rotate camera-controls shadow-intensity="1"
                                                        class="w-full h-full cursor-grab active:cursor-grabbing">
                                                    </model-viewer>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                @endforeach
            @endif

            </div>
        </div>
</x-app-layout>