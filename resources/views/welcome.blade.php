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
    <link rel="icon" type="icon/x-icon" href="img/Rocke.png">
</head>

<style>
    html,
    body {
        height: 100%;
        scroll-behavior: smooth;
    }

    body {
        display: flex;
        width: 100%;
        flex-direction: column;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .container-fluid {
        width: 100% !important;
        padding-right: 0 !important;
        padding-left: 0 !important;
        margin-right: auto;
        margin-left: auto;
    }

    main,
    .container-fluid {
        flex: 1;
    }


    .social-icon-footer {
        transition: all 0.3s ease-in-out;
        text-decoration: none;
    }

    .social-icon-footer:hover {
        transform: translateY(-5px) scale(1.1);
        background-position: 1 !important;
        background-color: rgba(255, 255, 255, 0.9) !important;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
    }

    .fb-hover:hover {
        color: #1877F2 !important;
    }

    .ig-hover:hover {
        color: #FF1493 !important;
    }

    .wa-hover:hover {
        color: #25D366 !important;
    }

    .uber-icon-hover:hover {
        filter: none;
        transition: 0.3s ease;
    }

    #button1 {
        background-color: #FFD43B;
    }

    #button2 {
        background-color: #FFD43B;
        color: #000;
    }

    #button1:hover {
        background-color: rgb(255, 0, 0);
        transition-duration: 500ms;
    }

    #button2:hover {
        background-color: rgb(255, 0, 0);
        color: #FFF;
        transition-duration: 500ms;
    }

    @font-face {
        font-family: 'DiloWord';
        src: url('/Fonts/DiloWorld.ttf') format('truetype');
        font-weight: 600;
    }

    @font-face {
        font-family: 'Caveat-variableFont_wgth';
        src: url('/Fonts/Caveat-variableFont_wgth.ttf') format('truetype');

    }

    @font-face {
        font-family: 'PlayfairDisplay';
        src: url('/Fonts/Playfair_Display/PlayfairDisplay-VariableFont_wght.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Ubuntu-bold';
        src: url('/Fonts/Ubuntu/Ubuntu-bold.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Ubuntu-boldItalic';
        src: url('/Fonts/Ubuntu/Ubuntu-boldItalic.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Ubuntu-MediumItalic';
        src: url('/Fonts/Ubuntu/Ubuntu-MediumItalic.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Ubuntu-Regular';
        src: url('/Fonts/Ubuntu/Ubuntu-Regular.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Bebas_Neue';
        src: url('/Fonts/Bebas_Neue/BebasNeue-Regular.ttg') format('truetype');
    }

    .content-box {
        columns: 3 auto;
        column-span: 0px;
    }

    .box {
        column
    }

    #parr1,
    #parr2,
    #parr3 {
        font-family: 'PlayfairDisplay';
        font-weight: 550;
        line-height: 32px;
        text-align: center;
    }
</style>

<body class="antialiased">
    <nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top shadow-sm py-3">
        <div class="container-fluid px-lg-5">
            <!-- Logo con el Cohete -->
            <a class="navbar-brand d-flex align-items-center" href="#Hero">
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
                        <a class="nav-link text-dark" href="#Hero">Inicio</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#Promotions">Promociones</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#Dishes">Platillos</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#3D">Recorrido 3D</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-dark" href="#Map">Ubicaciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <Main>
        <!-- Hero Section -->
        <section class="w-100 overflow-hidden position-relative" style="background-image: url('{{ asset('/img/Portada_Hero_Section_Better.png') }}'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat; 
                color: white;  object-fit: cover; max-height: 650px; width: auto; display: inline-block; height:525px;"
            id="Hero">
            <div class="position-relative w-150" style="height: 500px;">
                <div class="position-absolute bottom-0 start-0 mb-1 ms-4 ms-md-5 ps-lg-5" style="z-index: 3;">
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-lg px-5 py-3 shadow-lg fw-bold" href="#"
                            style="border-radius: 50px; border: none;" id="button1">
                            <i class="fa-regular fa-star me-2" style="color: #000;" id="star"></i>
                            Ver Menu
                        </a>
                        <a class="btn btn-lg px-4.5 py-3 fw-bold shadow-sm" href="#"
                            style="border-radius: 50px; border: none;" id="button2">
                            <i class="fa-regular fa-star me-2" style="color: #000;" id="car"></i>
                            Hacer Pedido
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nosotros Section -->
        <section class="container my-5 py-4" id="Ubicaciones">
            <div class="row align-items-center g-5">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-danger font-weight-bold d-block mb-2 style-title-sub"
                        style="font-family:Ubuntu-bold; font-size: 24px; text-align: center; letter-spacing: 8%; line-height: 150%;">
                        ¿Quiénes Somos?
                    </span>
                    <h2 class="display-5 font-weight-black text-uppercase mb-4 tracking-tight"
                        style="font-family: DiloWord; font-size: 55px; letter-spacing: 0.5%; line-height: 80%; text-align: center;">
                        Somos Rocket Papas 🚀
                    </h2>

                    <p class="text-secondary leading-relaxed mb-4"
                        style="font-size: 24px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000; ">
                        Nacimos en 2019 en Torreón, Coahuila, con un concepto </p>
                    <p class="text-secondary leading-relaxed mb-4"
                        style="font-size: 24px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000;">
                        diferente de
                        comida rápida:
                        papas rellenas en conos,</p>
                    <p class="text-secondary leading-relaxed mb-4"
                        style="font-size: 24px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000;">
                        hamburguesas
                        jugosas, alitas irresistibles y mucho más.</p>


                    <h4 class="font-weight-black text-uppercase mb-5 tracking-wide text-dark"
                        style="font-size: 32px; font-family: Bebas_Neue; font-weight: 600; line-height: 80%; letter-spacing: 4%; text-align: center;">
                        Ingredientes de calidad, sabor único y el mejor servicio a domicilio
                    </h4>

                    <div class="row pt-2 text-center text-md-left">
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-star fa-xl" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 140%;">
                                    Ingredientes de Calidad
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-house fa-xl" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 140%;">
                                    Servicio a Domicilio
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-fire fa-xl" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 140%;">
                                    Sabor que te hace volver
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div
                        class="position-relative overflow-hidden rounded-4 shadow-lg transition-transform duration-300 hover-scale">
                        <img src="{{ asset('img/Cheeseburguer_Papas.jpg') }}"
                            class="img-fluid w-100 h-auto d-block object-fit-cover" style="max-height: 480px;">
                    </div>
                </div>

            </div>
            <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>
        </section>

        <!-- Promociones Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;" id="Promotions">
        </section>

        <!-- Platillos Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;" id="Dishes">
        </section>

        <!-- Visor 3D Section -->
        <section class="w-100 overflow-hidden" style="background-color: #00AEEF; color: white;" id="3D">
        </section>

        <!-- Mapa Section -->
        <section class="container my-5" id="Map" x-data="{ sucursal: 'independencia' }">
            <div class="row g-4 align-items-center">

                <div class="col-md-4">
                    <div class="list-group shadow-sm rounded-3 overflow-hidden">
                        <button type="button" class="list-group-item list-group-item-action p-3 font-weight-bold"
                            :class="sucursal === 'independencia' ? 'active bg-primary border-primary text-white' : 'text-secondary'"
                            @click="sucursal = 'independencia'">
                            HEB Independencia
                        </button>

                        <button type="button" class="list-group-item list-group-item-action p-3 font-weight-bold"
                            :class="sucursal === 'revolucion' ? 'active bg-primary border-primary text-white' : 'text-secondary'"
                            @click="sucursal = 'revolucion'">
                            HEB Revolución
                        </button>

                        <button type="button" class="list-group-item list-group-item-action p-3 font-weight-bold"
                            :class="sucursal === 'constitucion' ? 'active bg-primary border-primary text-white' : 'text-secondary'"
                            @click="sucursal = 'constitucion'">
                            Soriana Constitución
                        </button>

                        <button type="button" class="list-group-item list-group-item-action p-3 font-weight-bold"
                            :class="sucursal === 'rosita' ? 'active bg-primary border-primary text-white' : 'text-secondary'"
                            @click="sucursal = 'rosita'">
                            AlSuper La Rosita
                        </button>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="w-100 rounded-4 shadow-sm border border-light overflow-hidden bg-light"
                        style="height: 400px;">
                        <div x-show="sucursal === 'independencia'" class="w-100 h-100" x-cloak>
                            <iframe
                                src="https://maps.google.com/maps?q=H-E-B%20Independencia,%20Torre%C3%B3n&t=&z=16&ie=UTF8&iwloc=&output=embed"
                                class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <div x-show="sucursal === 'revolucion'" class="w-100 h-100" x-cloak>
                            <iframe
                                src="https://maps.google.com/maps?q=H-E-B%20Revoluci%C3%B3n,%20Torre%C3%B3n&t=&z=16&ie=UTF8&iwloc=&output=embed"
                                class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>


                        <div x-show="sucursal === 'constitucion'" class="w-100 h-100" x-cloak>
                            <iframe
                                src="https://maps.google.com/maps?q=Soriana%20H%C3%A9per%20Constituci%C3%B3n,%20Torre%C3%B3n&t=&z=16&ie=UTF8&iwloc=&output=embed"
                                class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <div x-show="sucursal === 'rosita'" class="w-100 h-100" x-cloak>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d450.0693032155668!2d-103.4188891533775!3d25.519902710523766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb88d2c30c13%3A0xac1020d5df33b3dc!2sROCKET%20PAPAS!5e0!3m2!1ses!2smx!4v1782320742355!5m2!1ses!2smx"
                                class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>
    </Main>

    <footer class="text-white py-5" style="background-color: #fdfcfc;">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-4 mb-4 mb-md-0">
                    <p class="h5 mb-3" style="color:black;"><i class="fa-solid fa-phone me-2"></i> +52 1 871 426 2173
                    </p>
                    <p class="h5" style="color:black;"><i class="fa-solid fa-location-dot me-2"></i> <strong> Torreon,
                            Coahuila </strong>
                    <p> <small style="color: #000; text-align: center;">Envios a toda la ciudad</small> </p>
                    </p>
                    <p class="h5 mb-3" style="color: #000;"> <i class="fa-regular fa-clock" style="color:  #000;"></i>
                        <strong> Horario: </strong>
                    <p> <small style="color: #000;"> Lunes-Domingo: 1pm-9pm </small> </p>
                    </p>
                    </a>
                </div>

                <!-- Logo Central -->
                <div class="col-md-4 text-center mb-4 mb-md-0" style="color:black;">
                    <a href="#Hero" style="text-decoration: none; color: #000;">
                        <img src="{{ asset('img/Rocke.png') }}" class="rounded-circle shadow mb-2"
                            style="width: 120px;">
                        <h4 class="fw-bold">Rocket Papas</h4>
                        <small class="d-block">Hecho para antojar</small>
                    </a>
                </div>

                <!-- Redes Sociales -->
                <div class="col-md-4 text-center text-md-end">
                    <h5 class="fw-bold mb-3" style="color: #000;">¡Síguenos en redes sociales!</h5>
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="https://www.facebook.com/people/Rocket-Papas/61555615209607/?locale=es_LA"
                            class="social-icon-footer fb-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #1877F2;"><i
                                class="fa-brands fa-facebook-f"></i></a>

                        <a href="https://www.instagram.com/rocketpapas/"
                            class="social-icon-footer ig-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #FF1493;"><i
                                class="fa-brands fa-instagram"></i></a>

                        <a href="https://wa.me/5218714262173"
                            class="social-icon-footer wa-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #25D366;"><i class="fa-brands fa-whatsapp"></i></a>

                        <a href="https://www.ubereats.com/mx/search?q=Rocket%20papas"
                            class="social-icon-footer text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px;">
                            <img src="{{ asset('img/uber-eats-icon.png') }}"
                                style="width: 32px; height: 32px; object-fit: contain; filter: grayscale(100%) brightness(0.3); transform: scale(1.2);"
                                class="uber-icon-hover" /></a>

                        <a href="https://wa.me/5218714262173"
                            class="social-icon-footer wa-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px; color: #25D366;"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25">
                <p class="text-secondary small">
                    <span id="sys-cmark" style="cursor: default; user-select: none;">&copy;</span>
                    Copyright 2026 - Rocket Papas - Todos los derechos Reservados
                </p>
            </div>
        </div>
    </footer>
</body>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@vite(['resources/js/app.js'])

</html>