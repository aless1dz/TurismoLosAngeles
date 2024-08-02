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

    <!-- sección viajes locales coahuila inicio -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> viajes locales </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-ViescaParras.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>viesca-parras.</h3>
                    <p>viesca y parras son pueblos en coahuila, méxico, conocidos por su historia y viñedos. viesca ofrece paisajes desérticos y dunas, mientras que parras es famoso por su producción de vino y arquitectura colonial.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-TorreonViesca.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>torreón-viesca.</h3>
                    <p>recorrido por la región desértica de coahuila, que conecta una ciudad industrial con un pueblo histórico conocido por sus dunas y paisajes naturales.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-TermasSanJoaquin.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>termas de san joaquín.</h3>
                    <p>las termas de san joaquín son un resort de aguas termales en coahuila, méxico, ofreciendo baños termales, spa y un entorno relajante ideal para el descanso y la salud.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Muzquiz.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>múzquiz.</h3>
                    <p>múzquiz es un municipio en coahuila, méxico, conocido por su riqueza cultural y natural. ofrece visitas a reservas naturales, cuevas, y la oportunidad de explorar la cultura indígena kikapú.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-MoorelearTorreon.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>moorelear-torreón.</h3>
                    <p>vamos a moorelear todo el día, conoce museos en torreón, turismo religioso, paseo morelos y much más.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-GeneralCepeda.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>general cepeda.</h3>
                    <p>general cepeda es un municipio en coahuila, méxico, conocido por su tranquilidad y paisajes rurales. es famoso por sus petroglifos, fósiles y eventos culturales locales.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Cuatrocienegas.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>cuatrociénegas.</h3>
                    <p>cuatrociénegas es un área natural protegida en coahuila, méxico, famosa por sus pozas, dunas de yeso y biodiversidad única. es un destino popular para ecoturismo y estudios científicos.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Arteaga.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> coahuila </a>
                    </div>
                    <h3>arteaga.</h3>
                    <p>arteaga es un pueblo en coahuila, méxico, conocido por sus paisajes montañosos y clima fresco. es un destino popular para actividades al aire libre como el senderismo y el esquí.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

            </div>

        </div>

    </section>

    <!-- sección viajes locales coahuila final -->

    <!-- sección viajes locales durango inicio -->

    <section class="blogs-durango" id="blogs-durango">

        <h1 class="heading"> viajes a durango </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-ViejoOeste.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> durango </a>
                    </div>
                    <h3>viejo oeste.</h3>
                    <p>el viejo oeste en durango es un parque temático que recrea la época de los vaqueros con espectáculos en vivo y visitas a sets de películas.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-PuenteOjuela.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> durango </a>
                    </div>
                    <h3>puente de ojuela.</h3>
                    <p>el puente de ojuela en durango es un antiguo puente colgante sobre un cañón, famoso por su historia minera y su impresionante estructura.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-Mexiquillo.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> durango </a>
                    </div>
                    <h3>mexiquillo.</h3>
                    <p>mexiquillo es un parque natural en durango con formaciones rocosas, bosques, cascadas y ríos, ideal para senderismo, ciclismo y camping.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

            </div>

        </div>

    </section>

    <!-- sección viajes locales durango final -->

    <!-- sección viajes locales extras inicio -->

    <section class="blogs-more" id="blogs-more">

        <h1 class="heading"> extras </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="{{ asset('ImgViajes/IMG-BioparqueEstrella.jpg') }}" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fa-solid fa-location-dot"></i> monterrey </a>
                    </div>
                    <h3>bioparque estrella.</h3>
                    <p>el bioparque estrella en monterrey es un parque de vida silvestre que ofrece safaris, exhibiciones de animales y actividades recreativas. es un destino ideal para disfrutar en familia y aprender sobre la conservación de la naturaleza.</p>
                    <a href="#" class="btn">leer más</a>
                </div>

            </div>

        </div>

    </section>

    <!-- sección viajes locales extras final -->

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

    <!-- custom js file link -->
     <script src="{{ asset('js/viajes.js') }}"></script>
    
</body>
</html>