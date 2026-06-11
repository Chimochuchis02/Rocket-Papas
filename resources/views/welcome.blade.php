<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket Papas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top shadow-sm py-3">
        <div class="container-fluid px-lg-5">
            <!-- Logo con el Cohete -->
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="public/img/Limoncillo.png" alt="Logo Easy Peasy" class="rounded-circle shadow-sm me-2"
                    style="width: 55px; height: 55px; border: 2px solid #FFD43B;">
                <div class="d-none d-sm-block">
                    <span class="fw-bold text-dark mb-0 h4 d-block" style="letter-spacing: -1px;">Rocket Papas</span>
                    <small class="text-muted fw-bold text-uppercase"
                        style="font-size: 0.6rem; letter-spacing: 2px;">Hecho para antojar</small>
                </div>
            </a>

            <!-- Botón Móvil -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navEnglishJoy" aria-controls="navEnglishJoy" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links de Navegación -->
            <div class="collapse navbar-collapse" id="navEnglishJoy">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-bold text-uppercase" style="font-size: 0.85rem;">
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="Nosotros.html">Promociones</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="Ejercicios.html">Ejercicios</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="Cursos.html">Cursos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>