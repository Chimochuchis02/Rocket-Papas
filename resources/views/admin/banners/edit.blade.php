<x-app-layout>
    <div class="container mt-5 text-white">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark border-secondary shadow-lg">
                    <div class="card-header border-secondary d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #FFF;">Editar Producto: {{ $banner->id }}
                        </h4>
                        <a href="{{ route('banners.index') }}" class="btn btn-danger">Cancelar</a>
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

                        <form action="{{ route('banners.update', $banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="image_path" class="form-label text-warning fw-bold">Actualizar
                                        Banner (.jpeg, .png, .jpg, .webp)</label>
                                    <input type="file" name="image_banner" id="image_banner"
                                        class="form-control bg-secondary text-white">
                                    <small style="color: #FFF;">Deje este campo vacío si no desea cambiar el banner
                                        actual.</small>
                                </div>

                                <div class="col-md-6 text-center">
                                    <span class="text-xs text-gray-400 d-block mb-2">Estado del banner actual:</span>
                                    @if($banner->image_banner)
                                        <span class="badge bg-success"><i class="fa-solid fa-check"
                                                style="color: rgb(99, 230, 190);"></i> Existe 1 archivo de imagen
                                            Cargado</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fa-solid fa-x"
                                                style="color: rgb(255, 0, 0);"></i>Sin Imagen actualmente</span>
                                    @endif
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