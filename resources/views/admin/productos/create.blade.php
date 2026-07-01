<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center">
                <a href="{{ route('productos.index') }}"
                    class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg text-sm uppercase tracking-wider shadow-md transition duration-150">
                    Ver Inventario
                </a>
            </div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 rounded shadow flex items-center">
                        <span class="mr-2">✅</span>
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                        <strong>¡Fallo de validación!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div
                        style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="flex flex-col">
                        <label for="nombre" class="font-semibold mb-1" style="color: #000;">Nombre Del
                            Producto*:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                            class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" style="color: #FFF;"
                            required />
                    </div>

                    <div class="flex flex-col">
                        <label for="precio" class="font-semibold mb-1" style="color: #000;">Precio*:</label>
                        <input type="number" name="precio" id="precio" step="0.01" value="{{ old('precio') }}"
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
                        <label for="image_path" class="font-semibold mb-1" style="color: #000;">Imagen del
                            Producto*:</label>
                        <input type="file" name="image_path" id="image_path" accept="image/*"
                            value="{{ old('image_path') }}"
                            class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"
                            style="color: #000;" required />
                    </div>

                    <div class="flex flex-col">
                        <label for="type" class="font-semibold mb-1" style="color: #000;">Tipo de Registro*:</label>
                        <select name="type" id="type"
                            class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                            <option value="" style="color: #FFF;">-- Seleccione una opción --</option>
                            <option value="dish" {{ old('type') == 'dish' ? 'selected' : '' }}>Platillo</option>
                            <option value="promotion" {{ old('type') == 'promotion' ? 'selected' : '' }}>Promoción
                                Especial</option>
                        </select>
                    </div>

                    <div id="campos-promocion" class="hidden space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label for="start_date" class="font-semibold mb-1" style="color: #000;">Fecha de
                                    Inicio
                                    de la
                                    Promoción*:</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                    class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                    style="color: #FFF;" required />
                            </div>

                            <div class="flex flex-col">
                                <label for="end_date" class="font-semibold mb-1" style="color: #000;">Fecha de Fin
                                    de la
                                    Promoción*:</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                    class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                    style="color: #FFF;" required />
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full font-bold py-3 px-4 rounded shadow transition duration-200"
                            style="background-color: #000; color: #FFF;">
                            Guardar Producto en Inventario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectTipo = document.getElementById('type');
            const contenedorPromocion = document.getElementById('campos-promocion');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');

            function evaluarTipo(valor) {
                if (valor === 'promotion') {
                    contenedorPromocion.classList.remove('hidden');
                    startDateInput.required = true;
                    endDateInput.required = true;
                } else {
                    contenedorPromocion.classList.add('hidden');
                    startDateInput.required = false;
                    endDateInput.required = false;
                }
            }

            selectTipo.addEventListener('change', function () {
                evaluarTipo(this.value);
                if (this.value !== 'promotion') {
                    startDateInput.value = '';
                    endDateInput.value = '';
                }
            });

            evaluarTipo(selectTipo.value);
        });
    </script>

</x-app-layout>