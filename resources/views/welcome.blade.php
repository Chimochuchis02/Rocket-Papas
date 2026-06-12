<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket Papas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TuFuente:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top shadow-sm py-3">
        <div class="container-fluid px-lg-5">
            <!-- Logo con el Cohete -->
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="{{ asset('img/Rocke.png') }}" class="rounded-circle shadow-sm me-2"
                    style="width: 55px; height: 55px; border: 2px solid #FFF;">
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
                        <a class="nav-link text-dark" href="#">Inicio</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#">Promociones</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#">Platillos</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#">Recorrido 3D</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#">Ubicaciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <Main>
        <!-- Hero Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
            <!-- Decoración de fondo -->
            <div class="position-absolute translate-middle rounded-circle d-none d-lg-block"
                style="width: 300px; height: 300px; background-color: #FF1493; top: 10%; left: -5%; opacity: 0.8;">
            </div>

            <!-- CAMBIO 1: Cambiamos px-5 por px-0 para que el contenido toque las orillas -->
            <div class="container-fluid px-0 position-relative" style="z-index: 2;">

                <!-- CAMBIO 2: Añadimos g-0 para eliminar el espacio entre columnas y que la imagen pegue a la derecha -->
                <div class="row g-0 align-items-center justify-content-center">

                    <!-- Texto y CTAs -->
                    <!-- CAMBIO 3: Añadimos ps-lg-5 para que el texto no pegue al borde del monitor, pero el fondo sí -->
                    <div class="col-lg-8 col-xl-7 col-xxl-6 ps-lg-5">
                        <div class="mb-5 text-center text-xl-start ps-lg-5">
                            <div class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm">
                                BIENVENIDO A EASY PEASY ENGLISH
                            </div>

                            <h1 class="display-3 fw-bold mb-4" style="line-height: 1.1;">
                                Hablar inglés es <br> <span style="color: #FFD43B;">posible</span>
                                <i class="fa-solid fa-lemon ms-2" style="color:yellow;"></i>
                            </h1>

                            <p class="lead fw-normal mb-5 opacity-90">
                                Clases personalizadas diseñadas para que hables desde los primeros <strong>7
                                    meses</strong>.
                                En <strong>Torreon, Coahuila...</strong>Tu camino al bilingüismo empieza aquí de la
                                forma
                                más divertida.
                            </p>

                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-lg px-5 py-3 shadow-lg fw-bold text-white" href="#contacto"
                                    style="background-color: #FF1493; border-radius: 50px; border: none;">
                                    <i class="fa-brands fa-whatsapp me-2"></i>Mensaje a Whatsapp
                                </a>
                                <a class="btn btn-lg px-5 py-3 fw-bold shadow-sm" href="./Cursos.html"
                                    style="background-color: #FFD43B; border-radius: 50px; color: #000; border: none;">
                                    Ver cursos
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Imagen Flotante -->
                    <div class="col-xl-4 col-xxl-6 d-none d-xl-block text-center position-relative mt-5 pt-4">
                        <div class="p-3 bg-white rounded-5 shadow-lg transform-hover" style="transition: 0.3s;">
                            <img class="img-fluid rounded-5 w-100" src="public/img/Happy_House.png"
                                alt="Clase en Easy Peasy English" style="object-fit: cover; max-height: 550px;" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nosotros Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
        </section>

        <!-- Promociones Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
        </section>

        <!-- Platillos Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
        </section>

        <!-- Visor 3D Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
        </section>

        <!-- Mapa Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;">
        </section>
    </Main>

    <footer class="text-white py-5" style="background-color: #2e2b2b;">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <!-- Datos de Contacto -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <p class="h5 mb-3"><i class="fa-solid fa-phone me-2"></i> +52 1 871 426 2173</p>
                    <p class="h5"><i class="fa-solid fa-location-dot me-2"></i> Residencial Campestre la Rosita, 27250
                        Torreón, Coah.</p>
                    <a href="#" style="text-decoration: none; color:white;">
                        <p class="h5 mb-3">Politicas De Seguridad</p>
                    </a>
                </div>

                <!-- Logo Central -->
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{ asset('img/Rocke.png') }}" class="rounded-circle shadow mb-2" style="width: 120px;">
                    <h4 class="fw-bold">Rocket Papas</h4>
                    <small class="d-block">Hecho para antojar</small>
                </div>

                <!-- Redes Sociales -->
                <div class="col-md-4 text-center text-md-end">
                    <h5 class="fw-bold mb-3">¡Síguenos en redes sociales!</h5>
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="https://www.facebook.com/people/Rocket-Papas/61555615209607/?locale=es_LA"
                            class="social-icon-footer fb-hover text-white bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #1877F2;"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rocketpapas/"
                            class="social-icon-footer ig-hover text-white bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #FF1493;"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://wa.me/5218714262173"
                            class="social-icon-footer wa-hover text-white bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #25D366;"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5 pt-4 border-top border-white border-opacity-25">
                <small>&copy; Copyright 2026 - Rocket Papas - Todos los derechos Reservados</small>
            </div>
        </div>
    </footer>
</body>

<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

</html>