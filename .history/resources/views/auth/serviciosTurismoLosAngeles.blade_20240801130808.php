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
            <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
            <div id="search-btn" class="fas fa-search" style="display: none;"></div> 
        </div>

    </header> 

    <!-- sección encabezado final -->

    <!-- search form -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <!-- <form action="">
             <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label> 
        </form>  -->
    </div>

    <!-- sección principal inicio -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">

                    <div class="box" style="background: url('/ImgServicios/IMG-Visa.jpg') no-repeat;">
                        <div class="content">
                            <h3>trámite de visas</h3>
                            <p>para tramitar la visa es necesario realizar una cita en nuestra oficina, esta no tiene ningún costo y nos permitirá evaluar tu perfil, brindarte información y resolver todas tus dudas. si deseas agendar una cita, por favor proporciona tu nombre, día y hora de preferencia para verificar la disponibilidad.</p>
                            <a href="/visa" class="btn">leer más</a>
                        </div>
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgServicios/IMG-Pasaporte.jpg') no-repeat;">
                        <div class="content">
                            <h3>trámite de pasaporte</h3>
                            <p>obtén tu pasaporte de forma rápida y sencilla con nuestro servicio. ¡viaja sin límites y vive nuevas aventuras con tu pasaporte en mano!</p>
                            <a href="/pasaporte" class="btn">leer más</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgServicios/IMG-Unidades.png') no-repeat;">
                        <div class="content">
                            <h3>renta de unidades</h3>
                            <p>¿tienes un próximo viaje o evento y necesitas transporte? ¡lLAMA, cOTIZA Y rENTA con nosotros! Realizamos tu cotización con base en tus necesidades. viaja de manera rápida y segura. contamos con las certificaciones necesarias, profesionalismo y más de 20 años de experiencia que nos respaldan.</p>
                            <a href="/unidades" class="btn">leer más</a>
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
    <script src="{{ asset('js/servicios.js') }}"></script>
    
</body>
</html>