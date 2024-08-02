<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | Turismo Los Angeles</title>


   <!-- link font awesome -->
   <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <!-- link css -->
   <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
   

</head>
<body>

    <!-- sección encabezado inicio -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-angel"></i> turismo los angeles. </a>

        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            @guest 
            <a href="/inicio">inicio</a>
            <a href="/servicios">nuestros servicios</a>
            <a href="#shop">galeria</a>
            <a href="/citas">citas</a>
            <a href="/iniciar-sesion">iniciar sesión</a>

            @else 
            <a href="/inicio">inicio</a>
            <a href="/servicios">nuestros servicios</a>
            <a href="#shop">galeria</a>
            <a href="#packages">citas</a>
            <a href="/inicio" onclick="confirmLogout(event)">cerrar sesión</a>
            @endguest
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
            <h3>trámite de visas</h3>
            <p>¿deseas viajar a estados unidos? ya sea que desees visitar a tus familiares en el extranjero, explorar nuevos destinos turísticos o realizar viajes de negocios, nuestro servicio de trámite de visas está aquí para ayudarte a hacer tus sueños de viaje realidad.</p>
            <p>¡no dejes que el proceso de visa te detenga, nosotros te ayudamos a obtener tu visa en un solo viaje por primera vez o renovación.</p>
            <p>¡cualquier duda estamos al pendiente y a la orden!</p> 
            <p>¡gracias por tu interés en nuestros servicios de visas!</p>

        </div>

    </section>

    <!-- sección principal final -->

    <!-- sección primera vez y renovación inicio -->

     <section class="first-time" id="first-time">

        <h1 class="heading">primera vez</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/Img-PrimeraVez.png') }}" alt="">
                </div>
                <div class="content">
                    <h3>servicio integral de trámite de visa por primera vez</h3>
                    <p>incluye: asesoría, trámite de cita en cAS y consulado, viaje redondo, hospedaje, traslados, llenado de solicitud y armado de expediente al 100%.</p>
                    <p>formato de derecho a visa: $160 dólares (su valor en pesos mexicanos varía según el cambio del dólar). nosotros te lo generamos en oficina al iniciar tu trámite.</p>
                    <p>para iniciar, venir preparado con: cURP, pasaporte vigente, correo electrónico en celular y anticipo mínimo de $500 por persona.</p>
                    <div class="price">$2,490 por persona</div>
                </div>
            </div>

        </div>

    </section> 

    <section class="renewal" id="renewal">

        <h1 class="heading">renovación</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="{{ asset('ImgServicios/IMG-Renovación.jpeg') }}" alt="">
                </div>
                <div class="content">
                    <h3>servicio integral de renovación de visa</h3>
                    <p>incluye: asesoría, trámite de cita en cAS y consulado, viaje redondo, traslados, llenado de solicitud y armado de expediente al 100%.</p>
                    <p>formato de derecho a visa: $160 dólares (su valor en pesos mexicanos varía según el cambio del dólar). nosotros te lo generamos en oficina al iniciar tu trámite.</p>
                    <p>para iniciar, venir preparado con: cURP, pasaporte vigente, visa anterior, correo electrónico en celular y anticipo mínimo de $500 por persona.</p>
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
    <script src="{{ asset('js/visa.js') }}"></script>
    
</body>
</html>