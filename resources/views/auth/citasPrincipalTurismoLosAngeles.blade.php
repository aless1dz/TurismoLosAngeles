<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas y Comentarios | Turismo Los Angeles</title>


    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/citasPrincipal.css') }}">


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

                    <div class="box" style="background: url('/ImgCitas/IMG-FVisa.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Cita Visa</h3>
                                <p>Reserva tu cita para iniciar tu solicitud de visa. Nuestro equipo te guiará a través de todo el proceso. ¡Haz clic aquí para agendar y asegurar tu lugar!</p>
                                <a href="/citasVisa" class="btn">Reservar cita</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgCitas/IMG-FPasaporte.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Cita Pasaporte</h3>
                                <p>¿Necesitas un pasaporte? programa tu cita de manera rápida y sencilla. Evita largas filas y obtén tu pasaporte a tiempo para tu próximo viaje. ¡Reserva aquí!</p>
                                <a href="/citaPasaporte" class="btn">Reservar cita</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgCitas/IMG-FUnidades.png') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Renta de Unidades</h3>
                                <p>Explora nuestras unidades disponibles para alquiler. Tenemos opciones que se ajustan a tus necesidades. Programa una cita para una visita guiada. ¡Contáctanos y agenda hoy mismo!</p>
                                <a href="/citasUnidades" class="btn">Reservar cita</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgCitas/IMG-FCotizacion.png') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Cita Cotizaciones</h3>
                                <p>¿Buscas una cotización personalizada para nuestros productos o servicios? programa una cita y obtén una evaluación detallada que se ajuste a tus necesidades y presupuesto. ¡Agenda tu cita ahora!</p>
                                <a href="/citasCotizacion" class="btn">Reservar cita</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgCitas/IMG-FComentario.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Comentario</h3>
                                <p>Nos encantaría conocer tu opinión. ¿Tienes alguna sugerencia o pregunta? deja tu comentario aquí y comparte tus ideas con nosotros. ¡Gracias por ayudarnos a mejorar!</p>
                                <a href="/citas" class="btn">Realizar comentario</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgCitas/IMG-FViajes.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <h3>Cita Viajes</h3>
                                <p>¿Listo para tu próxima aventura? Programa una cita con nuestros expertos en viajes y deja que te ayudemos a planificar el viaje perfecto. Ya sea que busques destinos exóticos o escapadas relajantes, estamos aquí para asesorarte. ¡Agenda tu cita hoy y empieza a planear tu viaje ideal!</p>
                                <a href="/citasViajes" class="btn">Reservar cita</a>
                            </div>
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
    <script src="{{ asset('js/citasPrincipal.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>