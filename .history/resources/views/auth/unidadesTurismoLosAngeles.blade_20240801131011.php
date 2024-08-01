<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | Turismo Los Angeles</title>


    <!-- font awesome cdn link -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">


</head>
<body>

    <!-- sección encabezado inicio -->

    <header class="header">

        <a href="/inicio" class="logo"> <i class="fas fa-angel"></i> turismo los angeles. </a>

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
                <a href="#" style="text-transform: none;"> <i class="fas fa-envelope"></i> turismolosangelespro@gmail.com </a>
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

    <!-- link css -->
    <script src="{{ asset('js/unidades.js') }}"></script>
    
</body>
</html>