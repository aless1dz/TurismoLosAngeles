<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa | Turismo Los Angeles</title>

   <!-- link font awesome -->
   <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <!-- link css -->
   <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
   <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

</head>
<body>

    <!-- sección encabezado inicio -->

    <header class="header">
        <a href="inicio" class="logo"> <i class="fas fa-angel"></i> Turismo Los Ángeles </a>

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
            <img src="{{ asset('ImgServicios/IMG-SobreNosotrosVisas.png') }}" alt="">
        </div>

        <div class="content">
            <h3>Trámite de visas</h3>
            <p>¿Deseas viajar a Estados Unidos? ya sea que desees visitar a tus familiares en el extranjero, explorar nuevos destinos turísticos o realizar viajes de negocios, nuestro servicio de trámite de visas está aquí para ayudarte a hacer tus sueños de viaje realidad.</p>
            <p>¡No dejes que el proceso de visa te detenga, nosotros te ayudamos a obtener tu visa en un solo viaje por primera vez o renovación.</p>
            <p>¡Cualquier duda estamos al pendiente y a la orden!</p> 
            <p>¡Gracias por tu interés en nuestros servicios de visas!</p>

        </div>

    </section>

    <!-- sección principal final -->

    <!-- sección primera vez y renovación inicio -->

     <section class="first-time" id="first-time">

        <h1 class="heading">Primera vez</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/Img-PrimeraVez.png') }}" alt="">
                </div>
                <div class="content">
                    <h3>Servicio integral de trámite de visa por primera vez</h3>
                    <p>Incluye: asesoría, trámite de cita en CAS y consulado, viaje redondo, hospedaje, traslados, llenado de solicitud y armado de expediente al 100%.</p>
                    <p>Formato de derecho a visa: $160 dólares (su valor en pesos mexicanos varía según el cambio del dólar). Nosotros te lo generamos en oficina al iniciar tu trámite.</p>
                    <p>Para iniciar, venir preparado con: CURP, pasaporte vigente, correo electrónico en celular y anticipo mínimo de $500 por persona.</p>
                    <div class="price">$2,490 por persona</div>
                </div>
            </div>

        </div>

    </section> 

    <section class="renewal" id="renewal">

        <h1 class="heading">Renovación</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/IMG-Renovación.jpeg') }}" alt="">
                </div>
                <div class="content">
                    <h3>Servicio integral de renovación de visa</h3>
                    <p>Incluye: asesoría, trámite de cita en CAS y consulado, viaje redondo, traslados, llenado de solicitud y armado de expediente al 100%.</p>
                    <p>Formato de derecho a visa: $160 dólares (su valor en pesos mexicanos varía según el cambio del dólar). Nosotros te lo generamos en oficina al iniciar tu trámite.</p>
                    <p>Para iniciar, venir preparado con: CURP, pasaporte vigente, visa anterior, correo electrónico en celular y anticipo mínimo de $500 por persona.</p>
                    <div class="price">$2,190 por persona</div>
                </div>
            </div>

        </div>

    </section> 

    <!-- sección primera vez y renovación final -->

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
    <script src="{{ asset('js/visa.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>