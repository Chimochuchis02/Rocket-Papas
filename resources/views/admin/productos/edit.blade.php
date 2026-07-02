<x-app-layout>
    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-secondary shadow-lg">
                    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #FFF;">Editar Producto: {{ $producto->nombre }} del tipo ->
                            <strong>{{ $producto->type }}</strong>
                        </h4>
                        <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="card-body">

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

                        <form action="{{ route('productos.update', $producto->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre" class="form-label text-gray-400" style="color: #FFF;">Título
                                    (Opcional):</label>
                                <input type="nombre" class="form-class bg-secondary text-white form-control" id="nombre"
                                    name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label" style="color: #FFF;">Descripción (Opcional)
                                    :</label>
                                <textarea class="form-control bg-secondary text-white" id="desc" name="desc"
                                    rows="3">{{ old('desc', $producto->desc) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label" style="color: #FFF;">Precio (Opcional) :</label>
                                <input type="number" step="0.01" class="form-control bg-secondary text-white"
                                    id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
                            </div>

                            <hr class="border-secondary my-4">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="image_path" class="form-label text-warning fw-bold">Actualizar
                                        Imagenes (.jpeg, .png, .jpg, .webp)</label>
                                    <input type="file" name="image_path" id="image_path"
                                        class="form-control bg-secondary text-white">
                                    <small style="color: #FFF;">Deje este campo vacío si no desea cambiar la imagen
                                        actual.</small>
                                </div>
                                <div class="col-md-6 text-center">
                                    <span class="text-xs text-gray-400 d-block mb-2">Estado de la imagen
                                        actual:</span>
                                    @if($producto->image_path)
                                        <span class="badge bg-success"><i class="fa-solid fa-check"
                                                style="color: rgb(99, 230, 190);"></i> Existe 1 archivo de imagen
                                            Cargado</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fa-solid fa-x"
                                                style="color: rgb(255, 0, 0);"></i>Sin Imagen actualmente</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @if($producto->type === 'promotion')
                                            <label for="start_date" class="form-label" style="color: #FFF;">Fecha De Inicio
                                                (Opcional)
                                                :</label>
                                            <input type="date"
                                                class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                                id="start_date" name="start_date"
                                                value="{{ old('start_date', $producto->type === 'promotion' && $producto->promotion->start_date) }}">

                                            <label for="end_date" class="form-label" style="color: #FFF;">Fecha De Finalizacion
                                                (Opcional) :</label>
                                            <input type="date"
                                                class="rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                                id="end_date" name="end_date"
                                                value="{{ old('end_date', $producto->type === 'promotion' && $producto->promotion->end_date) }}">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr class="border-secondary my-4">



                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar Producto</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>