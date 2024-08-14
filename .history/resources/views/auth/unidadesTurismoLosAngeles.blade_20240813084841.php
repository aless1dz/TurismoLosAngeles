<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidades | Turismo Los Angeles</title>

    <!-- font awesome cdn link -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

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
        <a href="/citasPrincipal">citas</a>

    <div class="user-menu">
        @guest
            <a href="/iniciar-sesion" class="dropdown-toggle">iniciar sesión</a>
        @else
        <a href="/mis-citas">Mis citas</a>

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

    <!-- sección principal inicio -->

    <section class="about" id="about">

        <div class="image">
            <img src="{{ asset('ImgServicios/IMG-Chofer.png') }}" alt="">
        </div>

        <div class="content">
            <h3>renta de unidades</h3>
            <p>contamos con las certificaciones necesarias, el más alto nivel de profesionalismo y una sólida trayectoria de más de 20 años de experiencia que nos respaldan.</p>
            <p>nuestro compromiso con la excelencia y la satisfacción del cliente es evidente en cada proyecto que emprendemos.</p> 
            <p>nos dedicamos a ofrecer soluciones de calidad, adaptándonos a las necesidades específicas de cada cliente y garantizando resultados que superan sus expectativas. Gracias a nuestro equipo de expertos y a nuestro enfoque innovador, hemos logrado establecer una reputación de confianza y liderazgo en el sector.</p>
        </div>

    </section> 

    <!-- sección principal final -->

    <!-- sección unidades inicio -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> nuestras unidades </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Autobus.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> hasta 44 pasajeros </a>
                    </div>
                    <h3>autobús.</h3>
                    <p>viaja con nosotros y disfruta de comodidad y confianza. nuestros autobuses garantizan tu confort y seguridad.</p>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Sprinter.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> hasta 20 pasajeros </a>
                    </div>
                    <h3>sprinter.</h3>
                    <p>viaja seguro en nuestros sprinters, equipados con tecnología avanzada para tu protección y comodidad.</p>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Hiace.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> hasta 14 pasajeros </a>
                    </div>
                    <h3>hiace.</h3>
                    <p>viaja rápido y cómodo en nuestras Hiace, diseñadas para ofrecerte un traslado ágil y eficiente.</p>
                </div>
                      
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- sección unidades final -->

    <!-- sección cotización inicio -->

    <section class="quotation" id="quotation">

        <h1 class="heading">cotización</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/IMG-Cotizacion.jpg') }}" alt="">
                </div>
                <div class="content">
                    <h3>si deseas realizar una cotización, requerimos de los siguientes datos para poder realizarla: </h3>
                    <p>nombre completo de la persona que solicita la cotización.</p>
                    <p>whatsApp.</p>
                    <p>destino.</p>
                    <p>número de pasajeros.</p>
                    <p>día de salida y día de regreso.</p>
                    <p>translados aproximados (en caso de requerirse).</p>
                    <div class="info-quota">¡será un gusto atenderte!</div>
                </div>
            </div>

        </div>

    </section>

    <!-- sección cotización final -->

    <!-- sección píe de página inicio -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>enlaces directos</h3>
                <a href="/inicio">inicio</a>
                <a href="/servicios">nuestros servicios</a>
                <a href="/viajes">viajes</a>
                <a href="/citasPrincipal">citas</a>
            </div>

            <div class="box">
                <h3>enlaces adicionales</h3>
                <a href="/visa">visas</a>
                <a href="/pasaporte">pasaporte</a>
                <a href="/unidades">unidades</a>
            </div>

            <div class="box">
                <h3>contacto</h3>
                <a href="https://wa.me/8714010593" target="_blank"> <i class="fas fa-phone"></i> visas (871) 401 0593 </a>
                <a href="https://wa.me/8712174806" target="_blank"> <i class="fas fa-phone"></i> viajes (871) 217 4806 </a>
                <a href="https://wa.me/8714572300" target="_blank"> <i class="fas fa-phone"></i> unidades (871) 457 2300 </a>
                <a href="mailto:turismolosangelespro@gmail.com" target="_blank" style="text-transform: none;"> <i class="fas fa-envelope"></i> turismolosangelespro@gmail.com </a>
                <a href="https://www.google.com/maps/search/?api=1&query=25.539489240121423,-103.45462295777837" target="_blank"> <i class="fas fa-map"></i>  av morelos 482, primero de cobián centro, 27000 torreón, coah. </a> 
            </div>

            <div class="box">
                <h3>siguenos</h3>
                <a href="https://www.facebook.com/TurismoLosAngeless/?locale=es_LA" target="_blank"> <i class="fab fa-facebook"></i> facebook </a>
                <a href="https://wa.me/8712174806" target="_blank"> <i class="fab fa-whatsapp"></i> whatsApp</a>
                <a href="https://www.instagram.com/turismolosangeles1/?hl=es-la" target="_blank"> <i class="fab fa-instagram"></i> instagram </a>
            </div>

        </div>

        <div class="credit">copyright © 2024 <span>turismo los angeles</span> | todos los derechos reservados.</div>

    </section>
    
    <!-- sección píe de página final -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- link css -->
    <script src="{{ asset('js/unidades.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>