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
        <a href="/mis-citas">Mis citas</a>

            <a href="" class="dropdown-toggle">bienvenido, {{ Auth::user()->name }} </a>
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

    <!-- sección principal inicio -->

    <section class="about" id="about">

        <div class="image">
            <img src="{{ asset('ImgServicios/IMG-Chofer.png') }}" alt="">
        </div>

        <div class="content">
            <h3>Renta de unidades</h3>
            <p>Contamos con las certificaciones necesarias, el más alto nivel de profesionalismo y una sólida trayectoria de más de 20 años de experiencia que nos respaldan.</p>
            <p>Nuestro compromiso con la excelencia y la satisfacción del cliente es evidente en cada proyecto que emprendemos.</p> 
            <p>Nos dedicamos a ofrecer soluciones de calidad, adaptándonos a las necesidades específicas de cada cliente garantizando resultados que superan sus expectativas. Gracias a nuestro equipo de expertos y a nuestro enfoque innovador, hemos logrado establecer una reputación de confianza y liderazgo en el sector.</p>
        </div>

    </section> 

    <!-- sección principal final -->

    <!-- sección unidades inicio -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> Nuestras unidades </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Autobus.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> Hasta 44 pasajeros </a>
                    </div>
                    <h3>Autobús.</h3>
                    <p>Viaja con nosotros y disfruta de comodidad y confianza. Nuestros autobuses garantizan tu confort y seguridad.</p>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Sprinter.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> Hasta 20 pasajeros </a>
                    </div>
                    <h3>Sprinter.</h3>
                    <p>Viaja seguro en nuestros sprinters, equipados con tecnología avanzada para tu protección y comodidad.</p>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgServicios/IMG-Hiace.png') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> Hasta 14 pasajeros </a>
                    </div>
                    <h3>Hiace.</h3>
                    <p>Viaja rápido y cómodo en nuestras Hiace, diseñadas para ofrecerte un traslado ágil y eficiente.</p>
                </div>
                      
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- sección unidades final -->

    <!-- sección cotización inicio -->

    <section class="quotation" id="quotation">

        <h1 class="heading">Cotización</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/IMG-Cotizacion.jpg') }}" alt="">
                </div>
                <div class="content">
                    <h3>Si deseas realizar una cotización, requerimos de los siguientes datos para poder realizarla: </h3>
                    <p>Nombre completo de la persona que solicita la cotización.</p>
                    <p>WhatsApp.</p>
                    <p>Destino.</p>
                    <p>Número de pasajeros.</p>
                    <p>Día de salida y día de regreso.</p>
                    <p>Translados aproximados (en caso de requerirse).</p>
                    <div class="info-quota">¡Será un gusto atenderte!</div>
                </div>
            </div>

        </div>

    </section>

    <!-- sección cotización final -->

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

    <!-- link css -->
    <script src="{{ asset('js/unidades.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>