<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket Papas</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="icon/x-icon" href="{{ asset('img/Rocke.png') }}">
</head>

<body class="antialiased">
    <!-- Loading Page -->
    <div id="rocket-preloader" class="preloader-overlay">
        <div class="loader-content">
            <div class="rocket-spinner">
                <div class="fire-flame"></div>
            </div>
            <img src="{{ asset('img/Rocke.png') }}" class="loader-text rounded-circle shadow-sm me-2">
            <h2 class="loader-sub">Cargando...</h2>
            <h3 style="color: #000; font-family: Bebas_Neue;">Hecho Para Antojar</h3>
        </div>
    </div>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top shadow-sm py-3">
        <div class="container-fluid px-lg-5">
            <a class="navbar-brand d-flex align-items-center" href="#Hero">
                <img src="{{ asset('img/Rocke.png') }}" class="rounded-circle shadow-sm me-2"
                    style="width: 55px; height: 55px; border: 2px solid #FFF;">
                <div class="d-sm-block">
                    <span class="d-block d-sm-block d-xs-block fw-bold text-dark mb-0 h4 d-block"
                        style="letter-spacing: -1px;">Rocket Papas</span>
                    <small class=" d-block d-sm-block d-xs-block text-muted fw-bold text-uppercase"
                        style="font-size: 0.6rem; letter-spacing: 2px;">Hecho para antojar</small>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navRocketPapas" aria-controls="navRocketPapas" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navRocketPapas">
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
        <!-- Hero Section-->
        <section class="w-100 overflow-hidden position-relative" style="background-image: url('{{ $bannerActivo ? asset('storage/' . $bannerActivo->image_banner) : asset('/img/Portada_Hero_Section_Better.png') }}'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat; 
                color: white;" id="Hero">

            <div class="position-relative w-150" style="height: 500px;">
                <div class="position-absolute bottom-0 start-0 mb-1 ms-4 ms-md-5 ps-lg-5" style="z-index: 3;">
                    <div class="d-flex flex-column flex-xl-row justify-content-center align-items-center gap-3 mt-4 w-100"
                        style="z-index: 3;">

                        <a class="btn btn-lg px-5 py-3 shadow-lg fw-bold" data-bs-toggle="modal"
                            data-bs-target="#modalMenuRocket"
                            style="border-radius: 50px; border: none; margin-bottom: 10px;" id="button1">
                            <i class="fa-solid fa-star me-2" style="color: #000;" id="star"></i>
                            Menu
                        </a>

                        <a class="btn btn-lg px-4.5 py-3 fw-bold shadow-sm" href="tel:+5218714262173"
                            style="border-radius: 50px; border: none; margin-bottom: 10px;" id="button2">
                            <i class="fa-solid fa-phone me-2" style="color: #000;" id="car"></i>
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

                    <p class="leading-relaxed mb-4"
                        style="font-size: 20.5px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000; ">
                        Nacimos en 2019 en Torreón, Coahuila, con un concepto </p>
                    <p class="leading-relaxed mb-4"
                        style="font-size: 20.5px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000;">
                        diferente de
                        comida rápida:
                        papas rellenas en conos,</p>
                    <p class="leading-relaxed mb-4"
                        style="font-size: 20.5px; text-align: center; font-family: PlayfairDisplay; line-height: 32px; color: #000;">
                        hamburguesas
                        jugosas, alitas irresistibles y mucho más.</p>


                    <h4 class="font-weight-black text-uppercase mb-5 tracking-wide text-dark"
                        style="font-size: 32px; font-family: Bebas_Neue; font-weight: 600; line-height: 80%; letter-spacing: 4%; text-align: center;">
                        Ingredientes de calidad, sabor único y el mejor servicio a domicilio
                    </h4>

                    <div class="row pt-2 text-center text-md-left feature-grid">
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-star fa-xl feature-icon" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1 feature-text"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 120%;">
                                    Ingredientes de Calidad
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-house fa-xl feature-icon" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1 feature-text"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 120%;">
                                    Servicio a Domicilio
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-2">
                                <i class="fa-solid fa-fire fa-xl feature-icon" style="color: rgb(255, 0, 0);"></i>
                                <span class="font-weight-bold text-uppercase small text-dark d-block mt-1 feature-text"
                                    style="font-family: DiloWord; font-weight: 600; font-size: 20px; line-height: 120%;">
                                    Sabor que te hace volver
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div
                        class="position-relative overflow-hidden rounded-4 shadow-lg transition-transform duration-300 hover-scale">
                        <img src="{{ asset('img/logo_Rocket_papas_banner.jpg') }}"
                            class="img-fluid w-100 h-auto d-block object-fit-cover" style="max-height: 480px;">
                    </div>
                </div>

            </div>
        </section>

        <!-- Promotions Section -->
        <section id="Promotions" class="py-5 bg-white">
            <div class="container">
                <div class="mb-4 position-relative">
                    <span class="text-uppercase fw-black tracking-wider d-inline-block" style="font-size: 2.1rem; 
                    font-family: 'Bebas Neue', sans-serif; 
                    background: linear-gradient(to right, #FF8A00, #ffc107); 
                    -webkit-background-clip: text; 
                    -webkit-text-fill-color: transparent;">
                        PROMOCIONES
                    </span>

                    <h2 class="display-4 fw-black text-uppercase tracking-wide mt-1 mb-0"
                        style="font-family: DiloWord; font-weight: 700; color: #000; letter-spacing: -2.5px;">
                        LAS MEJORES PROMOS

                        <span class="d-inline-block position-relative px-1" style="font-family: PlayfairDisplay; 
                        text-transform: none; 
                        font-size: 3.5rem; 
                        position: relative; 
                        top: -5px; 
                        background: linear-gradient(to right, #FF8A00, #ffc107); 
                        -webkit-background-clip: text; 
                        -webkit-text-fill-color: transparent;
                        z-index: 1; transform: rotate(-3deg);">
                            Para ti

                            <span class="position-absolute start-0 bottom-0 w-100" style="height: 6px; 
                            background: linear-gradient(to right, #FF8A00, #ffc107); 
                            border-radius: 4px; 
                            z-index: -1; 
                            transform: translateY(2px) rotate(-4deg); 
                            opacity: 0.85;">
                            </span>
                        </span>
                    </h2>
                </div>

                @isset($promociones)
                    @if($promociones->count() > 0)

                        <div id="carouselPromosRocket" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                            <div class="carousel-inner px-4 px-md-5 py-2">
                                @foreach($promociones->chunk(3) as $chunkIndex => $chunk)
                                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">

                                            @foreach($chunk as $promocion)
                                                @php
                                                    $product = $promocion->product;
                                                @endphp
                                                <div class="col">
                                                    <div class="card h-100 border-0 shadow-lg overflow-hidden position-relative group-hover-action"
                                                        style="border-radius: 16px; transition: transform 0.2s ease-in-out;">

                                                        <div class="position-relative w-100"
                                                            style="aspect-ratio: 1/1; overflow: hidden; background-color: #f8f9fa;">
                                                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                                                class="w-100 h-100 object-cover" alt="{{ $product->nombre }}"
                                                                style="object-fit: cover; transition: transform 0.3s ease;">

                                                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-overlay"
                                                                style="background: rgba(0,0,0,0.5); transition: opacity 0.2s ease; backdrop-filter: blur(2px);">
                                                                <button type="button"
                                                                    class="btn btn-warning fw-black text-uppercase px-4 py-2 rounded-pill shadow-lg transform transition hover:scale-105"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalPromo{{ $promocion->id }}">
                                                                    Ver Detalles
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($promociones->count() > 3)
                                <button class="carousel-control-prev positioning-arrows" type="button"
                                    data-bs-target="#carouselPromosRocket" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark p-3 p-md-4 rounded-circle"
                                        aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next positioning-arrows" type="button"
                                    data-bs-target="#carouselPromosRocket" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark p-3 p-md-4 rounded-circle"
                                        aria-hidden="true"></span>
                                </button>
                            @endif
                        </div>

                        @foreach($promociones as $promocion)
                            @php
                                $product = $promocion->product;
                            @endphp
                            <div class="modal fade" id="modalPromo{{ $promocion->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-xl">
                                    <div class="modal-content text-white border-0 shadow-2xl"
                                        style="background-color: #1a1a1a; border-radius: 24px; overflow: hidden;">
                                        <button type="button"
                                            class="btn-close btn-close-white position-absolute top-0 end-0 m-3 m-md-4"
                                            data-bs-dismiss="modal" aria-label="Close" style="z-index: 10; color: #FFF;"></button>
                                        <div class="row g-0">
                                            <div class="col-lg-6 d-none d-md-block"
                                                style="background: url('{{ asset('storage/' . $product->image_path) }}') center/cover no-repeat; min-height: 450px;">
                                            </div>
                                            <div class="col-12 d-lg-none">
                                                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-100"
                                                    style="max-height: 280px; object-fit: cover;">
                                            </div>
                                            <div
                                                class="col-lg-6 d-flex flex-column justify-content-center p-4 p-md-5 position-relative">
                                                <span
                                                    class="badge bg-danger text-white align-self-start mb-3 px-3 py-2 rounded-pill fw-bold text-uppercase tracking-wider">
                                                    Tiempo Limitado
                                                </span>
                                                <h3 class="fs-2 fw-black text-uppercase mb-3 text-break"
                                                    style="color: #ffc107; font-family: 'Lilita One', 'Arial Black', sans-serif; word-wrap: break-word; overflow-wrap: break-word;">
                                                    {{ $product->nombre }}
                                                </h3>
                                                <p class="text-light opacity-75 mb-4" style="font-size: 1rem; line-height: 1.5;">
                                                    {{ $product->desc ?? $product->descripcion }}
                                                </p>
                                                <div
                                                    class="bg-black bg-opacity-50 rounded-4 p-3 mb-4 border border-secondary border-opacity-25 shadow-sm">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="bg-success rounded-circle p-2 me-3 d-flex align-items-center justify-content-center"
                                                            style="width: 32px; height: 32px;">
                                                            <i class="fa-solid fa-play text-white small"></i>
                                                        </div>
                                                        <span class="text-light fw-bold">Inicia:
                                                            <span class="fw-normal opacity-75 ms-1">
                                                                {{ \Carbon\Carbon::parse($promocion->start_date)->translatedFormat('d \d\e F, Y') }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-danger rounded-circle p-2 me-3 d-flex align-items-center justify-content-center"
                                                            style="width: 32px; height: 32px;">
                                                            <i class="fa-solid fa-stop text-white small"></i>
                                                        </div>
                                                        <span class="text-light fw-bold">Termina:
                                                            <span class="fw-normal opacity-75 ms-1">
                                                                {{ \Carbon\Carbon::parse($promocion->end_date)->translatedFormat('d \d\e F, Y') }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="mt-auto d-flex justify-content-between align-items-end pt-3 border-top border-secondary border-opacity-25">
                                                    <div>
                                                        <p class="small mb-0 fw-bold text-uppercase tracking-widest"
                                                            style="color: #FFF">Promoción Única</p>
                                                        <p class="mb-0 fw-black text-white"
                                                            style="font-size: 2.5rem; line-height: 1;">
                                                            <span class="fs-4 me-1"
                                                                style="color: #FFF;">$</span>{{ number_format($product->precio, 2) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="col-12 text-center py-5">
                            <p class="text-muted fs-5">No hay promociones activas en este momento. ¡Pregunta por nuestras
                                dinámicas!</p>
                        </div>
                    @endif
                @endisset
            </div>
        </section>

        <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>

        <!-- dishes Section -->
        <section id="Dishes" class="py-3 bg-white">
            <div class="container">
                <div class="mb-4 position-relative">
                    <h2 class="text-center" style="font-family: DiloWord; font-weight: 700; font-size: 52px;">
                        PLATILLOS ESTRELLA
                    </h2>
                </div>

                @isset($platillos)
                    @if($platillos->count() > 0)

                        <div id="carouselPlatosRocket" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                            <!-- Padding lateral para no cortar las cards con las flechas -->
                            <div class="carousel-inner px-4 px-md-5 py-2">
                                @foreach($platillos->chunk(3) as $chunkIndex => $chunk)
                                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">

                                            @foreach($chunk as $platillo)
                                                @php
                                                    $producto = $platillo->product;
                                                @endphp
                                                <div class="col">
                                                    <div class="card h-100 border-0 shadow-lg overflow-hidden position-relative group-hover-action"
                                                        style="border-radius: 16px; transition: transform 0.2s ease-in-out;">

                                                        <div class="position-relative w-100"
                                                            style="aspect-ratio: 1/1; overflow: hidden; background-color: #f8f9fa;">
                                                            <img src="{{ asset('storage/' . $producto->image_path) }}"
                                                                class="w-100 h-100 object-cover" alt="{{ $producto->nombre }}"
                                                                style="object-fit: cover; transition: transform 0.3s ease;">

                                                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-overlay"
                                                                style="background: rgba(0,0,0,0.5); transition: opacity 0.2s ease; backdrop-filter: blur(2px);">
                                                                <button type="button"
                                                                    class="btn btn-warning fw-black text-uppercase px-4 py-2 rounded-pill shadow-lg transform transition hover:scale-105"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalPromo{{ $producto->id }}">
                                                                    Ver Detalles
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($platillos->count() > 3)
                                <button class="carousel-control-prev positioning-arrows" type="button"
                                    data-bs-target="#carouselPlatosRocket" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark p-3 p-md-4 rounded-circle"
                                        aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next positioning-arrows" type="button"
                                    data-bs-target="#carouselPlatosRocket" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark p-3 p-md-4 rounded-circle"
                                        aria-hidden="true"></span>
                                </button>
                            @endif
                        </div>

                        @foreach($platillos as $plato)
                            @php $producto = $plato->product; @endphp
                            <div class="modal fade" id="modalPromo{{ $producto->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg modal-xl-lg">
                                    <div class="modal-content text-white border-0 shadow-2xl"
                                        style="background-color: #1a1a1a; border-radius: 24px; overflow: hidden;">
                                        <button type="button"
                                            class="btn-close btn-close-white position-absolute top-0 end-0 m-3 m-md-4"
                                            data-bs-dismiss="modal" aria-label="Close" style="z-index: 10; color: #FFF;"></button>

                                        <div class="row g-0">
                                            <div class="col-lg-6 bg-black d-flex align-items-center justify-content-center position-relative"
                                                style="min-height: 350px; min-height: md-450px;">
                                                <div id="carouselMedia-{{ $producto->id }}" class="carousel slide w-100 h-100"
                                                    data-bs-ride="false" data-bs-interval="false">
                                                    <div class="carousel-inner w-100 h-100">
                                                        @php $slideIndex = 0; @endphp

                                                        @foreach(($producto->carrousel ?? []) as $carrusel)
                                                            @if(!empty($carrusel->model_3D_path))
                                                                <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }} w-100 h-100"
                                                                    style="min-height: 350px; background-color: #111;">
                                                                    <div
                                                                        class="w-100 h-100 d-flex align-items-center justify-content-center p-2">
                                                                        <video autoplay loop muted playsinline preload="auto"
                                                                            class="img-fluid rounded shadow-lg"
                                                                            style="max-height: 380px; object-fit: contain; width: auto;">
                                                                            <source src="{{ asset('storage/' . $carrusel->model_3D_path) }}"
                                                                                type="video/mp4">
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                                @php $slideIndex++; @endphp
                                                            @endif
                                                        @endforeach

                                                        @foreach(($producto->carrousel ?? []) as $carrusel)
                                                            @if(!empty($carrusel->imgs))
                                                                @php
                                                                    $carruselImgs = $carrusel->imgs;
                                                                    $imagenesExtras = is_string($carruselImgs) ? json_decode($carruselImgs, true) : $carruselImgs;
                                                                @endphp

                                                                @if(is_array($imagenesExtras))
                                                                    @foreach($imagenesExtras as $rutaImg)
                                                                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }} w-100 h-100"
                                                                            style="background: url({{ asset('storage/' . $rutaImg) }}) center/cover no-repeat; min-height: 350px;">
                                                                        </div>
                                                                        @php $slideIndex++; @endphp
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    @if($slideIndex > 1)
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselMedia-{{ $producto->id }}" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon bg-dark p-2 rounded-circle"
                                                                aria-hidden="true"></span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselMedia-{{ $producto->id }}" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon bg-dark p-2 rounded-circle"
                                                                aria-hidden="true"></span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

                                            <div
                                                class="col-lg-6 d-flex flex-column justify-content-center p-4 p-md-5 position-relative">
                                                <span
                                                    class="badge bg-danger text-white align-self-start mb-3 px-3 py-2 rounded-pill fw-bold text-uppercase tracking-wider">
                                                    <i class="fa-solid fa-star" style="color: rgb(255, 212, 59);"></i> De nuestros
                                                    Platillos Estrella
                                                </span>
                                                <h3 class="display-6 fw-black text-uppercase mb-3"
                                                    style="color: #ffc107; font-family: 'Lilita One', 'Arial Black', sans-serif;">
                                                    {{ $producto->nombre }}
                                                </h3>
                                                <p class="text-light opacity-75 mb-4" style="font-size: 1rem; line-height: 1.5;">
                                                    {{ $producto->desc ?? $producto->descripcion }}
                                                </p>
                                                <div
                                                    class="mt-auto d-flex justify-content-between align-items-end pt-3 border-top border-secondary border-opacity-25">
                                                    <div>
                                                        <p class="small mb-0 fw-bold text-uppercase tracking-widest"
                                                            style="color: #FFF">Precio Único</p>
                                                        <p class="mb-0 fw-black text-white"
                                                            style="font-size: 2.5rem; line-height: 1;">
                                                            <span class="fs-4 me-1"
                                                                style="color: #FFF;">$</span>{{ number_format($producto->precio, 2) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5">
                            <p class="text-muted fs-5">No hay platillos activos en este momento. ¡Pregunta por nuestras
                                dinámicas!</p>
                        </div>
                    @endif
                @endisset
            </div>
        </section>

        <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>

        <!-- 3D Section -->
        <section id="3D">
            <div>
                <div class="mb-2 position-relative">
                    <h2 class="text-center" style="font-family: DiloWord; font-weight: 700; font-size: 52px;">
                        Conoce Nuestras Instalaciones
                    </h2>
                </div>
                <iframe width="100%" height="100%"
                    src="https://niksgames.com/mycourses/model-viewer/examples/motorcycle/index.html"></iframe>
            </div>
        </section>

        <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>

        <!-- Map Section -->
        <div id="Map">
            <section class="container my-5" x-data="{ sucursal: 'independencia' }">
                <div class="row g-4 align-items-center" id="Map">

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

                            <button type="button" class="list-group-item list-group-item-action p-3 font-weight-bold"
                                :class="sucursal === 'bromo' ? 'active bg-primary border-primary text-white' : 'text-secondary'"
                                @click="sucursal = 'bromo'">
                                Loma Real II
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

                            <div x-show="sucursal === 'bromo'" class="w-100 h-100" x-cloak>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224.98379507961297!2d-103.3408013132296!3d25.547012151810474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fc5004da05b33%3A0xe4b6451c179864e4!2sPollo%20Pechugon!5e0!3m2!1ses!2smx!4v1783608095120!5m2!1ses!2smx"
                                    class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="text-center mt-5 pt-4 border-top border-black border-opacity-25"></div>
    </Main>

    <!-- Footer -->
    <footer class="text-white py-5" style="background-color: #fdfcfc;">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-4 mb-4 mb-md-0">
                    <a href="tel:+5218714262173" style="text-decoration: none;">
                        <p class="h5 mb-3" style="color:black;"><i class="fa-solid fa-phone me-2"></i> +52 1 871 426
                            2173
                        </p>
                    </a>
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

                <div class="col-md-4 text-center mb-4 mb-md-0" style="color:black;">
                    <a href="#Hero" style="text-decoration: none; color: #000;">
                        <img src="{{ asset('img/Rocke.png') }}" class="rounded-circle shadow mb-2"
                            style="width: 120px;">
                        <h4 class="fw-bold">Rocket Papas</h4>
                        <small class="d-block">Hecho para antojar</small>
                    </a>
                </div>

                <div class="col-md-4 text-center text-md-end">
                    <h5 class="fw-bold mb-3" style="color: #000;">¡Síguenos en redes sociales!</h5>
                    <div
                        class="d-flex flex-wrap justify-content-center justify-content-lg-end justify-content-md-end gap-2 gap-md-3">
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
                            class="social-icon-footer uber-icon-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px;">
                            <img src="{{ asset('img/uber-eats-icon.png') }}"
                                style="width: 32px; height: 32px; object-fit: contain; filter: grayscale(100%) brightness(0.3); transform: scale(1.2);" /></a>

                        <a href="https://www.didi-food.com/es-MX/food/search?q=Rocket%20papas"
                            class="social-icon-footer didi-icon-hover text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width: 45px; height: 45px;">
                            <img src="{{ asset('img/didi_food-logo.png') }}"
                                style="width: 38px; height: 38px; object-fit: contain; filter: grayscale(100%) brightness(0.3); transform: scale(1.2);" />
                        </a>

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

    <!-- Modal del Menu -->
    <div class="modal fade" id="modalMenuRocket" tabindex="-1" aria-labelledby="modalMenuRocketLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white border-0 shadow-2xl" style="border-radius: 20px;">

                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-black text-uppercase tracking-wider" id="modalMenuRocketLabel"
                        style="color: #ffc107;">
                        {{ $menuActivo ? $menuActivo->titulo : 'Nuestro Menú' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    @if($menuActivo && is_array($menuActivo->images_menus) && count($menuActivo->images_menus) > 0)
                        <div id="carouselMenuRocket" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($menuActivo->images_menus as $index => $imagen)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $imagen) }}" class="d-block w-100 rounded-3 shadow-md"
                                            style="max-height: 75vh; object-fit: contain;" alt="Parte del Menú">
                                    </div>
                                @endforeach
                            </div>

                            @if(count($menuActivo->images_menus) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMenuRocket"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span style="color: #FFF;">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselMenuRocket"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span style="color: #FFF;">Siguiente</span>
                                </button>
                            @endif
                        </div>

                    @else
                        <div class="text-center py-5">
                            <i class="fa-solid fa-utensils fa-3x mb-3 text-muted"></i>
                            <p class="fs-5 opacity-75">Estamos cocinando los últimos precios. ¡Pídelo por teléfono!</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!--Floating Buttons -->
    <div id="divFloating">
        <a href="https://wa.me/5218714262173" id="floating"
            class="social-icon-footer text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
            style="width: 62px; height: 62px;"> <i class="fa-brands fa-whatsapp fa-xl" style="color: rgb(14, 255, 183);"
                id="wha_icon"></i>
        </a>

        <div>
            <a href="#Hero" id="FloatingArrow"
                class="text-black bg-black bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                style="width: 60px; height: 60px;"> <i class="fa-solid fa-arrow-down fa-rotate-180 fa-xl"
                    style="color: rgb(10, 255, 182);"></i> </a>
        </div>

    </div>
</body>

@vite(['resources/js/app.js', 'resources/css/index.css'])
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</html>