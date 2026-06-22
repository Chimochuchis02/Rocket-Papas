<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <a href="{{ route('productos.create') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-primary text-white p-4">
                        <div class="card-body text-center">
                            <div class="display-1 mb-3">
                                <i class="bi bi-film"></i>
                            </div>
                            <h3 class="fw-bold">Productos</h3>
                            <p class="small opacity-75">Registrar o ver productos</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('carrouseles.create') }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-success text-white p-4">
                        <div class="card-body text-center">
                            <div class="display-1 mb-3">
                                <i class="bi bi-music-note-beamed"></i>
                            </div>
                            <h3 class="fw-bold">Carrouseles</h3>
                            <p class="small opacity-75">Ver diseños de carrouseles o registrar nuevos</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <style>
        .hover-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .hover-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
            filter: brightness(1.1);
        }
    </style>
</x-app-layout>