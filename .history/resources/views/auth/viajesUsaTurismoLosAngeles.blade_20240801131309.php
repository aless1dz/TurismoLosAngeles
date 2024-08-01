<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes USA | Turismo Los Angeles</title>


    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/viajes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">


</head>
<body>

    <!-- sección encabezado inicio -->

    <header class="header">

        <a href="/inicio" class="logo"> <i class="fas fa-angel"></i> turismo los angeles </a>

        <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="/inicio">inicio</a>
        <a href="/servicios">nuestros servicios</a>
        <a href="/viajes">viajes</a>
        <a href="#shop">galería</a>
        <a href="/citasPrincipal">citas</a>

    <div class="user-menu">
        @guest
            <a href="/iniciar-sesion" class="dropdown-toggle">iniciar sesión</a>
        @else
            <a href="" class="dropdown-toggle">bienvenido, {{ Auth::user()->name }} </a>
            <div class="dropdown-menu">
                <a href="/inicio" onclick="confirmLogout(event)">cerrar sesión</a>
            </div>
        @endguest
    </div>
    </nav> 

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search" style="display: none;"></div>
        </div>

    </header> <br><br><br>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- sección encabezado final -->

    <!-- search form -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

    </div>

    <!-- sección viajes usa inicio -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> viajes a estados unidos </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-SanAntonio.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> texas </a>
                    </div>
                    <h3>san antonio.</h3>
                    <p>san antonio es una ciudad histórica en texas, conocida por el alamo, el river walk, y su rica herencia cultural. ofrece una mezcla de historia, cultura, y entretenimiento, siendo un destino popular para turistas.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-McAllen2Dias.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> texas </a>
                    </div>
                    <h3>mcAllen 2 días.</h3>
                    <p>mcAllen es una vibrante ciudad en el sur de texas, conocida por su cálido clima, centros comerciales, y una floreciente escena artística. es un importante centro de comercio y cultura en la región fronteriza.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-McAllen1Dia.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> texas </a>
                    </div>
                    <h3>mcAllen 1 día.</h3>
                    <p>mcAllen destaca por su vida nocturna, eventos culturales y parques naturales, como el refugio nacional de vida silvestre de santa ana. es un destino atractivo tanto para compras como para actividades al aire libre.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-EaglePass.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> texas </a>
                    </div>
                    <h3>eagle pass.</h3>
                    <p>eagle pass es una ciudad fronteriza en texas, situada junto al río bravo. es conocida por su rica historia, proximidad a piedras negras, méxico, y como un punto de entrada para el comercio y el turismo binacional.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

            </div>

        </div>

    </section>

    <!-- sección viajes usa final -->

    <!-- sección píe de página inicio -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>enlaces directos</h3>
                <a href="#home">inicio</a>
                <a href="#about">nuestros servicios</a>
                <a href="#shop">galería</a>
                <a href="#packages">contacto</a>
                <a href="#reviews">iniciar sesión</a>
            </div>

            <div class="box">
                <h3>enlaces adicionales</h3>
                <a href="#">visas</a>
                <a href="#">pasaporte</a>
                <a href="#">unidades</a>
            </div>

            <div class="box">
                <h3>información de contacto</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#" style="text-transform: none;"> <i class="fas fa-envelope"></i> turismolosangeles@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> Av. Morelos #482 pte casi esquina con Leona Vicario. </a>
            </div>

            <div class="box">
                <h3>siguenos</h3>
                <a href="#"> <i class="fab fa-facebook"></i> facebook </a>
                <a href="#"> <i class="fab fa-whatsapp"></i> whatsApp</a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            </div>

        </div>

        <div class="credit">copyright © 2024 <span>turismo los angeles</span> | todos los derechos reservados.</div>

    </section>

    <!-- sección píe de página final -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="{{ asset('js/viajes.js') }}"></script>
    
</body>
</html>