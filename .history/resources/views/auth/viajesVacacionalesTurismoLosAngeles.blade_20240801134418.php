<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Vacacionales | Turismo Los Angeles</title>


    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/viajes.css') }}">
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

    <section class="blogs" id="blogs">

        <h1 class="heading"> viajes vacacionales </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-PortadaRiuMazatlan.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> sinaloa </a>
                    </div>
                    <h3>rIU mazatlán.</h3>
                    <p>rIU mazatlán es un resort todo incluido en la playa de mazatlán, ofreciendo lujo, múltiples restaurantes, piscinas, y entretenimiento diario para todas las edades.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-HuastecaPotosina.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> san luis potosí </a>
                    </div>
                    <h3>huasteca potosina.</h3>
                    <p>la huasteca potosina en san luis potosí es famosa por sus cascadas, ríos cristalinos, y actividades de ecoturismo como rafting y senderismo.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-MazatlanLasFlores.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> sinaloa </a>
                    </div>
                    <h3>mazatlán - las flores.</h3>
                    <p>las flores beach resort, ubicado en la zona dorada de mazatlán, ofrece habitaciones con vista al mar, piscinas, y fácil acceso a tiendas y vida nocturna.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-HuastecaHidalguense.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> hidalgo </a>
                    </div>
                    <h3>huasteca hidalguense.</h3>
                    <p>la huasteca hidalguense en hidalgo ofrece montañas, ríos, cascadas y rica cultura indígena, ideal para ecoturismo y aventuras.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-MazatlanHotelMision.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> sinaloa </a>
                    </div>
                    <h3>mazatlán - hotel misión.</h3>
                    <p>hotel misión mazatlán es un cómodo y accesible hotel con habitaciones bien equipadas, piscina al aire libre, y restaurante, ideal para una estancia relajante.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-AngelesLocos.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> jalisco </a>
                    </div>
                    <h3>ángeles locos.</h3>
                    <p>ángeles locos es un resort todo incluido en tenacatita, jalisco, ofreciendo actividades recreativas, deportes acuáticos y espectáculos en vivo, ideal para familias.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

            </div>

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