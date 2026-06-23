<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Panel de Creacion de Productos(Promociones/Platillos)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 rounded shadow flex items-center">
                        <span class="mr-2">✅</span>
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

                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="flex flex-col">
                        <label for="nombre" class="font-semibold mb-1">Nombre Del Producto*:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                            class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white" required />
                    </div>

                    <div class="flex flex-col">
                        <label for="desc" class="font-semibold mb-1">Descripción (Opcional):</label>
                        <textarea name="desc" id="desc" rows="3"
                            class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white">{{ old('desc') }}</textarea>
                    </div>

                    <div class="flex flex-col">
                        <label for="precio" class="font-semibold mb-1">Precio*:</label>
                        <input type="number" name="precio" id="precio" step="0.01" value="{{ old('precio') }}"
                            class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white" required />
                    </div>

                    <div class="flex flex-col">
                        <label for="type" class="font-semibold mb-1">Tipo de Registro*:</label>
                        <select name="type" id="type"
                            class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white" required>
                            <option value="">-- Selecciona una opción --</option>
                            <option value="dish" {{ old('type') == 'dish' ? 'selected' : '' }}>Platillo</option>
                            <option value="promotion" {{ old('type') == 'promotion' ? 'selected' : '' }}>Promoción
                                Especial</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="image_path" class="font-semibold mb-1">Imagen del Producto*:</label>
                        <input type="file" name="image_path" id="image_path" accept="image/*"
                            class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"
                            required />
                    </div>

                    <div id="campos-promocion" class="hidden space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label for="start_date" class="font-semibold mb-1">Fecha de Inicio de la
                                    Promoción*:</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                    class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white" />
                            </div>

                            <div class="flex flex-col">
                                <label for="end_date" class="font-semibold mb-1">Fecha de Fin de la Promoción*:</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                    class="rounded-md border-gray-300 dark:bg-gray-700 text-black dark:text-white" />
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

            // Evaluar al cambiar
            selectTipo.addEventListener('change', function () {
                evaluarTipo(this.value);
                if (this.value !== 'promotion') {
                    startDateInput.value = '';
                    endDateInput.value = '';
                }
            });

            // Evaluar al recargar si Laravel regresa por error
            evaluarTipo(selectTipo.value);
        });
    </script>

</x-app-layout>