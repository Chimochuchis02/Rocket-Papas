<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            <div class="flex justify-between items-center">
                <a href="{{ route('carrouseles.index') }}"
                    class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg text-sm uppercase tracking-wider shadow-md transition duration-150">
                    Ver Inventario
                </a>
            </div>

            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

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

                <form action="{{ route('carrouseles.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="flex flex-col">
                        <label for="nombre" class="font-semibold mb-1" style="color: #000;">Titulo Del
                            Producto*:</label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                            class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" style="color: #FFF;"
                            required />
                    </div>

                    <div class="flex flex-col">
                        <label for="nombre" class="font-semibold mb-1" style="color: #000;">Titulo De La
                            Tarjeta*:</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                            class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" style="color: #FFF;"
                            required />
                    </div>

                    <div class="flex flex-col">
                        <label for="desc" class="font-semibold mb-1" style="color: #000;">Descripción
                            (Opcional):</label>
                        <textarea name="desc" id="desc" rows="3"
                            class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                            style="color: #FFF;">{{ old('desc') }}</textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="image_path" class="font-semibold mb-1" style="color: #000;">Imagen del Producto
                            (Opcional):</label>
                        <input type="file" name="imgs[]" id="imgs" multiple accept="imgs/*"
                            class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"
                            style="color: #000;" />
                    </div>

                    <div class="flex flex-col">
                        <label for="model_3D_path" class="font-semibold mb-1" style="color: #000;">Video Render
                            (Opcional):</label>
                        <input type="file" name="model_3D_path" id="model_3D_path" accept="model_3D_path/*"
                            class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"
                            style="color: #000;" />
                            <small class="font-semibold mb-1" style="color: #000;">Solo se aceptan videos del tipo: MP4, WEBm</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="producto_id" class="form-label fw-bold text-warning">Vincular a Platillo
                                Estrella</label>
                            <select name="producto_id" id="producto_id"
                                class="form-select bg-dark text-white border-secondary @error('producto_id') is-invalid @enderror">
                                <option value="">-- Seleccione el platillo protagonista --</option>
                                @foreach($platillos as $platillo)
                                    <option value="{{ $platillo->id }}" {{ old('producto_id') == $platillo->id ? 'selected' : '' }}>
                                        {{ $platillo->nombre }} (${{ number_format($platillo->precio, 2) }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text text-muted-50 small">Solo se muestran los productos marcados como
                                Platillos.</div>
                            @error('producto_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full font-bold py-3 px-4 rounded shadow transition duration-200"
                                style="background-color: #000; color: #FFF;">
                                Guardar Carrousel
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>