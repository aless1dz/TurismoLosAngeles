<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes | Turismo Los Angeles</title>


    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/viajes.css') }}">


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

    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- sección encabezado final -->

    <!-- search form -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

    </div>

    <!-- sección principal inicio -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">

                    <div class="box" style="background: url('/ImgViajes/IMG-PortadaUsa.jpg') no-repeat;">
                        <div class="content">
                            <h3>viajes usa</h3>
                            <p>¡descubre los destinos de estados unidos que tenemos para ti! estados unidos es un país de inmensa diversidad, tanto en paisajes como en experiencias culturales. desde las vibrantes ciudades hasta los majestuosos parques nacionales, hay algo para todos los gustos.</p>
                            <a href="/viajesUsa" class="btn">leer más</a>
                        </div>
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgViajes/IMG-PortadaVacacionales.jpg') no-repeat;">
                        <div class="content">
                            <h3>viajes vacacionales</h3>
                            <p>¡bienvenido a nuestro mundo de increíbles destinos! aquí te presentamos una selección de lugares que puedes explorar junto a nosotros. ¿tienes en mente una fecha o destino en particular? estamos aquí para ayudarte a hacerlo realidad. ¡contáctanos y juntos planificamos tu próxima aventura inolvidable!</p>
                            <a href="/viajesVacacionales" class="btn">leer más</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgViajes/IMG-PortadaLocales.jpg') no-repeat;">
                        <div class="content">
                            <h3>viajes locales</h3>
                            <p>¡descubre los tesoros ocultos de coahuila y durango en nuestros increíbles viajes locales! disfruta de un día diferente con tu familia y amigos y conoce increíbles lugares que existen muy cerca de ti</p>
                            <a href="/viajesLocales" class="btn">leer más</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
        </div>

    </section>

    <!-- sección principal final -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>