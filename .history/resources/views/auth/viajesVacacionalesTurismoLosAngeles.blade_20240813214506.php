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

    <section class="blogs" id="blogs">

        <h1 class="heading"> Viajes Vacacionales </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-PortadaRiuMazatlan.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Sinaloa </a>
                    </div>
                    <h3>RIU Mazatlán.</h3>
                    <p>RIU Mazatlán es un resort todo incluido en la playa de Mazatlán, ofreciendo lujo, múltiples restaurantes, piscinas, y entretenimiento diario para todas las edades.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-HuastecaPotosina.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> San Luis Potosí </a>
                    </div>
                    <h3>Huasteca Potosina.</h3>
                    <p>La Huasteca Potosina en San Luis Potosí es famosa por sus cascadas, ríos cristalinos, y actividades de ecoturismo como rafting y senderismo.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-MazatlanLasFlores.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Sinaloa </a>
                    </div>
                    <h3>Mazatlán - Las Flores.</h3>
                    <p>Las Flores Beach Resort, ubicado en la zona dorada de Mazatlán, ofrece habitaciones con vista al mar, piscinas, y fácil acceso a tiendas y vida nocturna.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-HuastecaHidalguense.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Hidalgo </a>
                    </div>
                    <h3>Huasteca Hidalguense.</h3>
                    <p>La Huasteca Hidalguense en Hidalgo ofrece montañas, ríos, cascadas y rica cultura indígena, ideal para ecoturismo y aventuras.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-MazatlanHotelMision.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Sinaloa </a>
                    </div>
                    <h3>Mazatlán - Hotel Misión.</h3>
                    <p>Hotel Misión Mazatlán es un cómodo y accesible hotel con habitaciones bien equipadas, piscina al aire libre, y restaurante, ideal para una estancia relajante.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/Img-AngelesLocos.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Jalisco </a>
                    </div>
                    <h3>Ángeles Locos.</h3>
                    <p>Ángeles Locos es un resort todo incluido en Tenacatita, Jalisco, ofreciendo actividades recreativas, deportes acuáticos y espectáculos en vivo, ideal para familias.</p>
                    
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
    <script src="{{ asset('js/viajes.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>