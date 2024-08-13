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

</head>
<body>

    <!-- sección encabezado inicio -->

    <header class="header">

        <a href="/inicio" class="logo"> <i class="fas fa-angel"></i> Turismo Los Ángeles </a>

        <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="/inicio">Inicio</a>
        <a href="/servicios">Nuestros servicios</a>
        <a href="/viajes">Viajes</a>
        <a href="/citasPrincipal">Citas</a>

    <div class="user-menu">
        @guest
            <a href="/iniciar-sesion" class="dropdown-toggle">Iniciar sesión</a>
        @else
            <a href="" class="dropdown-toggle">Bienvenido, {{ Auth::user()->name }} </a>
            <div class="dropdown-menu">
                <a href="/inicio" onclick="confirmLogout(event)">Cerrar sesión</a>
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

        <h1 class="heading"> Viajes a Estados Unidos </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-SanAntonio.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Texas </a>
                    </div>
                    <h3>San Antonio.</h3>
                    <p>San Antonio es una ciudad histórica en Texas, conocida por el alamo, el river walk, y su rica herencia cultural. Ofrece una mezcla de historia, cultura, y entretenimiento, siendo un destino popular para turistas.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-McAllen2Dias.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Texas </a>
                    </div>
                    <h3>McAllen 2 días.</h3>
                    <p>McAllen es una vibrante ciudad en el sur de texas, conocida por su cálido clima, centros comerciales, y una floreciente escena artística. Es un importante centro de comercio y cultura en la región fronteriza.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-McAllen1Dia.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Texas </a>
                    </div>
                    <h3>McAllen 1 día.</h3>
                    <p>McAllen destaca por su vida nocturna, eventos culturales y parques naturales, como el refugio nacional de vida silvestre de santa ana. Es un destino atractivo tanto para compras como para actividades al aire libre.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-EaglePass.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Texas </a>
                    </div>
                    <h3>Eagle Pass.</h3>
                    <p>Eagle Pass es una ciudad fronteriza en Texas, situada junto al río bravo. Es conocida por su rica historia, proximidad a Piedras Negras, México, y como un punto de entrada para el comercio y el turismo binacional.</p>
                    
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- sección viajes usa final -->

    <!-- sección píe de página inicio -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Enlaces directos</h3>
                <a href="/inicio">Inicio</a>
                <a href="/servicios">Nuestros servicios</a>
                <a href="/viajes">Viajes</a>
                <a href="/citasPrincipal">Citas</a>
            </div>

            <div class="box">
                <h3>Enlaces adicionales</h3>
                <a href="/visa">Visas</a>
                <a href="/pasaporte">Pasaporte</a>
                <a href="/unidades">Unidades</a>
            </div>

            <div class="box">
                <h3>Contacto</h3>
                <a href="https://wa.me/8714010593" target="_blank"> <i class="fas fa-phone"></i> Visas (871) 401 0593 </a>
                <a href="https://wa.me/8712174806" target="_blank"> <i class="fas fa-phone"></i> Viajes (871) 217 4806 </a>
                <a href="https://wa.me/8714572300" target="_blank"> <i class="fas fa-phone"></i> Unidades (871) 457 2300 </a>
                <a href="mailto:turismolosangelespro@gmail.com" target="_blank" style="text-transform: none;"> <i class="fas fa-envelope"></i> turismolosangelespro@gmail.com </a>
                <a href="https://www.google.com/maps/search/?api=1&query=25.539489240121423,-103.45462295777837" target="_blank"> <i class="fas fa-map"></i>  Av morelos 482, primero de cobián centro, 27000 Torreón, Coah. </a> 
            </div>

            <div class="box">
                <h3>Siguenos</h3>
                <a href="https://www.facebook.com/TurismoLosAngeless/?locale=es_LA" target="_blank"> <i class="fab fa-facebook"></i> Facebook </a>
                <a href="https://wa.me/8712174806" target="_blank"> <i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.instagram.com/turismolosangeles1/?hl=es-la" target="_blank"> <i class="fab fa-instagram"></i> Instagram </a>
            </div>

        </div>

        <div class="credit">Copyright © 2024 <span>Turismo Los Ángeles</span> | Todos los derechos reservados.</div>

    </section>
    
    <!-- sección píe de página final -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="{{ asset('js/viajes.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>