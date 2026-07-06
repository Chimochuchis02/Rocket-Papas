<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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

                <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="flex flex-col">
                        <label for="image_path" class="font-semibold mb-1" style="color: #000;">Imagen del
                            Banner* :</label>
                        <input type="file" name="image_banner" id="image_banner" accept="image/*"
                            value="{{ old('image_banner') }}"
                            class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100"
                            style="color: #000;" required />
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full font-bold py-3 px-4 rounded shadow transition duration-200"
                            style="background-color: #000; color: #FFF;">
                            Guardar Carrousel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>