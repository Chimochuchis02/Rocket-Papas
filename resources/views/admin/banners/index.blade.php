<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            <div class="flex justify-between items-center">
                <a href="{{ route('banners.create') }}"
                    class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg text-sm uppercase tracking-wider shadow-md transition duration-150">
                    + Nuevo Banner
                </a>
            </div>
            
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 rounded shadow flex items-center">
                    <span class="mr-2"><i class="fa-solid fa-check" style="color: rgb(99, 230, 190);"></i></span>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="mb-6 p-4 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-200 rounded shadow">
                    <p class="font-bold mb-2">⚠️ Error de Validación:</p>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($banners->isEmpty())
                <div
                    class="text-center p-8 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <p class="text-white-500 dark:text-gray-400 font-medium">No hay Banners registrados actualmente.</p>
                </div>

            @else
                @foreach($banners as $banner)

                    <div x-data="{ open: false }"
                        class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">

                        <button @click="open = !open" type="button"
                            class="w-full flex items-center justify-between p-5 text-left font-bold text-gray-800 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <span
                                    class="px-2.5 py-1 text-xs font-black uppercase rounded bg-yellow-500/10 text-yellow-500 border border-yellow-500/20">
                                    ID: {{ $banner->id }}
                                </span>

                                <span class="text-lg tracking-wide uppercase font-black"
                                    style="color: #000;">
                                    {{ $banner->titulo_banner }}

                                </span>
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
                                    <div class="space-y-5">

                                        <div>
                                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-2"
                                                style="color: #000;">Imágen
                                                del banner:</span>
                                            <div class="grid grid-cols-3 gap-2">
                                                @if($banner->image_banner)
                                                    <div
                                                        class="aspect-square bg-gray-200 dark:bg-gray-950 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-800">
                                                        <img src="{{ asset('storage/' . $banner->image_banner) }}"
                                                            class="w-full h-full object-cover hover:scale-110 transition duration-200">
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="mt-4 flex items-center justify-between">
                                                @if($banner->is_Active)
                                                    <!-- Badge Esmeralda de Banner Actual -->
                                                    <span
                                                        class="px-3 py-1.5 bg-emerald-600 text-white text-xs font-bold rounded-lg shadow-sm">
                                                        Banner Actual
                                                    </span>
                                                @else
                                                    <!-- Formulario para Asignar como nuevo -->
                                                    <form action="{{ route('banners.activate', $banner->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-lg shadow-md transition duration-150">
                                                            Asignar como Banner
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>

                                            <div class="pt-3">
                                                <a href="{{ route('banners.edit', $banner->id) }}"
                                                    class="btn btn-zinc shadow-sm rounded-3 d-flex align-items-center justify-content-center border border-white border-opacity-10"
                                                    style="width: 45px; height: 45px; background-color: blue; color: #FFF;"
                                                    data-bs-toggle="tooltip" title="Editar">
                                                    <i class="fa-solid fa-pencil" style="color: rgb(99, 230, 190);"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                @endforeach
                    <div class="mt-2 px-3">
                        {{ $banners->links() }}
                    </div>
            @endif

            </div>
        </div>

</x-app-layout>