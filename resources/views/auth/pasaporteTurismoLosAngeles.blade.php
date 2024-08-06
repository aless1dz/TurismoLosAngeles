<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasaporte | Turismo Los Angeles</title>

    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">

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

    <!-- sección encabezo final -->

    <!-- search form -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

    </div>

    <!-- sección principal inicio -->

    <section class="about" id="about">

        <div class="image">
            <img src="{{ asset('ImgServicios/IMG-PasaportePortada.jpg') }}" alt="">
        </div>

        <div class="content">
            <h3>trámite de pasaporte</h3>
            <p>si deseas tramitar tu pasaporte mexicano, ¡no dudes en contactarnos!</p>
            <p>si prefieres tramitarlo por tu cuenta, también te brindamos toda la información necesaria para que puedas realizar el trámite en el horario adecuado, ya sea por llamada en los horarios recomendados por nosotros (8:00 a 10:00 am y 6:00 a 8:00 pm) o por whatsApp.</p>
            <p>¡elige la opción que más te convenga y comienza a planear tus próximas aventuras alrededor del mundo con tu nuevo pasaporte en mano!</p> 
        </div>

    </section>

    <section class="category">

        <h1 class="heading">¿qué necesitas para tramitar tu pasaporte en relaciones exteriores?</h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('ImgServicios/IMG-ActaNacimiento.png') }}" alt="">
                <h3>acta de nacimiento</h3>
                <p>acta de nacimiento mexicana original. debe presentarse sin tachaduras, roturas o enmendaduras.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgServicios/IMG-Identificacion.png') }}" alt="">
                <h3>identificación</h3>
                <p>identificación oficial vigente con fotografía en original. puede ser tu credencial para votar, cédula profesional, título profesional, etc. siempre y cuando aparezcan los nombres y apellidos igual que en el acta de nacimiento mexicana.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgServicios/IMG-PasaporteAnterior.png') }}" alt="">
                <h3>pasaporte</h3>
                <p>pasaporte anterior en original (en caso de ser renovación) y fotocopia de la hoja de datos con fotografía.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgServicios/IMG-Pago.png') }}" alt="">
                <h3>pago</h3>
                <p>el pago de derechos se realiza el mismo día de su cita en el consulado, en efectivo y con el monto exacto.</p>
            </div>

        </div>

    </section> 

    <!-- sección principal final -->

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

    <!-- link js -->
    <script src="{{ asset('js/pasaporte.js') }}"></script>
    
</body>
</html>