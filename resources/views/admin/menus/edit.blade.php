<x-app-layout>
    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-secondary shadow-lg">
                    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #FFF;">Editar: {{ $menu->titulo }}</h4>
                        <a href="{{ route('menus.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="card-body"></div>

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

                    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="titulo" class="form-label text-gray-400">Título: </label>
                            <input type="text" class="form-class bg-secondary text-white form-control" id="titulo"
                                name="titulo" value="{{ old('titulo', $menu->titulo) }}">
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="model_3D_path" class="form-label text-warning fw-bold">Actualizar
                                    Imagenes (.jpeg, .png, .jpg, .webp) :</label>
                                <input type="file" name="images_menus[]" multiple accept="images_menus/*"
                                    id="images_menus" class="form-control bg-secondary text-white">
                                <small style="color: #FFF;">Deje este campo vacío si no desea cambiar las imagenes
                                    actuales.</small>
                            </div>
                            <div class="col-md-6 text-center">
                                <span class="text-xs text-gray-400 d-block mb-2">Estado de las imagenes
                                    actuales:</span>
                                @if($menu->images_menus)
                                    <span class="badge bg-success"><i class="fa-solid fa-check"
                                            style="color: rgb(99, 230, 190);"></i> Existen archivos de imagenes
                                        Cargadas</span>
                                @else
                                    <span class="badge bg-danger"><i class="fa-solid fa-x"
                                            style="color: rgb(255, 0, 0);"></i>Sin Imagenes actualmente</span>
                                @endif
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar Carrousel</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>