<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes Locales | Turismo Los Angeles</title>

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

    <!-- sección viajes locales coahuila inicio -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> Viajes Locales </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-ViescaParras.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Viesca-Parras.</h3>
                    <p>Viesca y Parras son pueblos en Coahuila, México, conocidos por su historia y viñedos. Viesca ofrece paisajes desérticos y dunas, mientras que Parras es famoso por su producción de vino y arquitectura colonial.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-TorreonViesca.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Torreón-Viesca.</h3>
                    <p>Recorrido por la región desértica de Coahuila, que conecta una ciudad industrial con un pueblo histórico conocido por sus dunas y paisajes naturales.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-TermasSanJoaquin.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Termas de San Joaquín.</h3>
                    <p>Las Termas de San Joaquín son un resort de aguas termales en Coahuila, México, ofreciendo baños termales, spa y un entorno relajante ideal para el descanso y la salud.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Muzquiz.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Múzquiz.</h3>
                    <p>Múzquiz es un municipio en Coahuila, México, conocido por su riqueza cultural y natural. Ofrece visitas a reservas naturales, cuevas, y la oportunidad de explorar la cultura indígena Kikapú.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-MoorelearTorreon.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Moorelear-Torreón.</h3>
                    <p>Vamos a Moorelear todo el día, conoce museos en Torreón, turismo religioso, paseo morelos y mucho más.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-GeneralCepeda.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>General Cepeda.</h3>
                    <p>General Cepeda es un municipio en Coahuila, México, conocido por su tranquilidad y paisajes rurales. Es famoso por sus petroglifos, fósiles y eventos culturales locales.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Cuatrocienegas.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Cuatrociénegas.</h3>
                    <p>Cuatrociénegas es un área natural protegida en Coahuila, México, famosa por sus pozas, dunas de yeso y biodiversidad única. Es un destino popular para ecoturismo y estudios científicos.</p>
    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Arteaga.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Coahuila </a>
                    </div>
                    <h3>Arteaga.</h3>
                    <p>Arteaga es un pueblo en Coahuila, México, conocido por sus paisajes montañosos y clima fresco. Es un destino popular para actividades al aire libre como el senderismo y el esquí.</p>
    
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- sección viajes locales coahuila final -->

    <!-- sección viajes locales durango inicio -->

    <section class="blogs-durango" id="blogs-durango">

        <h1 class="heading"> Viajes a Durango </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-ViejoOeste.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Durango </a>
                    </div>
                    <h3>Viejo Oeste.</h3>
                    <p>El Viejo Oeste en Durango es un parque temático que recrea la época de los vaqueros con espectáculos en vivo y visitas a sets de películas.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-PuenteOjuela.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Durango </a>
                    </div>
                    <h3>Puente de Ojuela.</h3>
                    <p>El Puente de Ojuela en Durango es un antiguo puente colgante sobre un cañón, famoso por su historia minera y su impresionante estructura.</p>
                    
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Mexiquillo.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Durango </a>
                    </div>
                    <h3>Mexiquillo.</h3>
                    <p>Mexiquillo es un parque natural en Durango con formaciones rocosas, bosques, cascadas y ríos, ideal para senderismo, ciclismo y camping.</p>
                    
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- sección viajes locales durango final -->

    <!-- sección viajes locales extras inicio -->

    <section class="blogs-more" id="blogs-more">

        <h1 class="heading"> Extras </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-BioparqueEstrella.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> Monterrey </a>
                    </div>
                    <h3>Bioparque Estrella.</h3>
                    <p>El Bioparque Estrella en Monterrey es un parque de vida silvestre que ofrece safaris, exhibiciones de animales y actividades recreativas. Es un destino ideal para disfrutar en familia y aprender sobre la conservación de la naturaleza.</p>
                    
                </div>

            </div>

        </div>

    </section>

    <!-- sección viajes locales extras final -->

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

    <!-- custom js file link -->
     <script src="{{ asset('js/viajes.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>