<x-app-layout>
    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-secondary shadow-lg">
                    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Editar Carrusel: {{ $carrousel->titulo }}</h4>
                        <a href="{{ route('carrouseles.index') }}" class="btn btn-outline-secondary btn-sm">Cancelar</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('carrouseles.update', $carrousel->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="titulo" class="form-label text-gray-400">Título </label>
                                <input type="text" class="form-class bg-secondary text-white form-control" id="titulo"
                                    name="titulo" value="{{ old('titulo', $carrousel->titulo) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">Descripción Corta</label>
                                <textarea class="form-control bg-secondary text-white" id="desc" name="desc"
                                    rows="3">{{ old('desc', $carrousel->desc) }}</textarea>
                            </div>

                            <!--<div class="mb-3">
                                <label for="precio" class="form-label">Precio (Opcional)</label>
                                <input type="number" step="0.01" class="form-control bg-secondary text-white"
                                    id="precio" name="precio" value="{{ old('precio', $carrousel->precio) }}">
                            </div> -->

                            <hr class="border-secondary my-4">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="model_3D_path" class="form-label text-warning fw-bold">Actualizar Modelo
                                        3D (.glb, .gltf)</label>
                                    <input type="file" class="form-control bg-secondary text-white" id="model_3D_path"
                                        name="model_3D_path">
                                    <small class="text-muted">Deja este campo vacío si no deseas cambiar el modelo
                                        actual.</small>
                                </div>
                                <div class="col-md-6 text-center">
                                    <span class="text-xs text-gray-400 d-block mb-2">Estado del Modelo Actual:</span>
                                    @if($carrousel->model_3D_path)
                                        <span class="badge bg-success"><i class="fa-solid fa-check"
                                                style="color: rgb(99, 230, 190);"></i> Archivo 3D Cargado</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fa-solid fa-x"
                                                style="color: rgb(255, 0, 0);"></i>Sin Modelo Asociado</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="model_3D_path" class="form-label text-warning fw-bold">Actualizar
                                        Imagenes (.jpeg, .png, .jpg, .webp)</label>
                                    <input type="file" name="imgs[]" multiple accept="imgs/*" id="imgs"
                                        class="form-control bg-secondary text-white">
                                    <small class="text-muted">Deja este campo vacío si no deseas cambiar las imagenes
                                        actuales.</small>
                                </div>
                                <div class="col-md-6 text-center">
                                    <span class="text-xs text-gray-400 d-block mb-2">Estado de las imagenes
                                        actuales:</span>
                                    @if($carrousel->imgs)
                                        <span class="badge bg-success"><i class="fa-solid fa-check"
                                                style="color: rgb(99, 230, 190);"></i> Existen archivos de imagenes
                                            Cargadas</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fa-solid fa-x"
                                                style="color: rgb(255, 0, 0);"></i>Sin Imagenes actualmente</span>
                                    @endif
                                </div>
                            </div>

                            <hr class="border-secondary my-4">



                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar Carrousel</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>