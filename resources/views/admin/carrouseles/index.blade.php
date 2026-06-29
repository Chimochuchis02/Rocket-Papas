<x-app-layout>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            <div class="flex justify-between items-center">
                <a href="{{ route('carrouseles.create') }}"
                    class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg text-sm uppercase tracking-wider shadow-md transition duration-150">
                    + Nuevo Banner
                </a>
            </div>

            @if($carrouseles->isEmpty())
                <div
                    class="text-center p-8 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <p class="text-white-500 dark:text-gray-400 font-medium">No hay carruseles registrados actualmente.</p>
                </div>

            @else
                @foreach($carrouseles as $carousel)

                    <div x-data="{ open: false }"
                        class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                        <button @click="open = !open" type="button"
                            class="w-full flex items-center justify-between p-5 text-left font-bold text-gray-800 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <span
                                    class="px-2.5 py-1 text-xs font-black uppercase rounded bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                                    ID: {{ $carousel->id }}
                                </span>
                                <span class="text-lg tracking-wide uppercase font-black"
                                    style="color: #000;">{{ $carousel->titulo }}</span>
                            </div>

                            <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div x-show="open" x-collapse x-cloak
                            class="border-t border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/40 p-6"
                            style="background-color: #FFF;">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                                <div class="space-y-4">
                                    <div>
                                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block"
                                            style="color: #000;">Slug de la
                                            URL:</span>
                                        <code
                                            class="text-sm bg-gray-100 dark:bg-gray-950 px-2 py-1 rounded text-red-500 font-mono block mt-1 break-all">
                                                                                                        {{ $carousel->slug }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </code>
                                    </div>

                                    <div>
                                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block"
                                            style="color: #000;">Descripción
                                            Comercial:</span>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 font-medium leading-relaxed"
                                            style="color: #000;">
                                            {{ $carousel->desc ?? 'Sin descripción añadida.' }}
                                        </p>
                                    </div>

                                    <div class="space-y-5">

                                        <div>
                                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2"
                                                style="color: #000;">Imágenes
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

                                        @if($carousel->model_3D_path)
                                            <div>
                                                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2"
                                                    style="color: #000;">Modelo
                                                    3D Interactivo:</span>
                                                <div
                                                    class="w-full h-48 bg-gray-100 dark:bg-gray-950 rounded-xl overflow-hidden relative border border-gray-200 dark:border-gray-800">
                                                    <model-viewer src="{{ asset('storage/' . $carousel->model_3D_path) }}"
                                                        alt="Modelo 3D" auto-rotate camera-controls shadow-intensity="1"
                                                        class="w-full h-full cursor-grab active:cursor-grabbing">
                                                    </model-viewer>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="pt-4">
                                            <form action="{{ route('carrousels.toggle-active', $carousel->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PATCH') <!-- Uso PATCH porque solo se va a modificar un campo -->

                                                @if($carousel->is_Active)
                                                    <button type="submit" class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                        title="Desactivar">
                                                        <i class="fa-solid fa-eye-slash me-1"></i> Desactivar
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                        title="Activar">
                                                        <i class="fa-solid fa-eye me-1"></i> Activar
                                                    </button>
                                                @endif
                                            </form>
                                        </div>

                                        <a href="{{ route('carrouseles.edit', $carousel->id) }}"
                                            class="btn btn-zinc shadow-sm rounded-3 d-flex align-items-center justify-content-center border border-white border-opacity-10"
                                            style="width: 38px; height: 38px;" data-bs-toggle="tooltip" title="Editar">
                                            <i class="bi bi-pencil-fill text-white small"></i>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                @endforeach
                    <div class="mt-2 px-3">
                        {{ $carrouseles->links() }}
                    </div>
            @endif

            </div>
        </div>
</x-app-layout>