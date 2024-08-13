<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <!-- link font awesome (íconos) -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
            <input type="search" id="search-box">
            <label for="search-box" class="fas fa-search"></label> 
        </form> 
    </div>

    <!-- sección principal inicio -->

    <section class="home" id="home">

        <div class="swiper home-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide">
                   <div class="box" style="background: url('/ImgInicio/IMG-IArteaga.png') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <span>Arteaga</span>
                                <h3>coahuila</h3>
                                <p>Arteaga, en la Sierra Madre Oriental, es un pueblo mágico con bosques, manzanos y cumbres nevadas. Ideal para ecoturismo, ofrece cabañas, senderismo, avistamiento de aves y paseos a caballo.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-ICuatrocienegas.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <span>Cuatrociénegas</span>
                                <h3>coahuila</h3>
                                <p>Cuatrociénegas es un pueblo mágico con historia, comida y vino. Alberga playas, pozos, ríos, mármol y montañas, formando uno de los oasis más peculiares y hermosos del mundo.</p>
                            <</div>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-IGeneralCepeda.jpg') no-repeat;">
                        <div class="content"> 
                            <div class="container-transparent">
                                <span>General Cepeda</span>
                                <h3>coahuila</h3>
                                <p>Ofrece una riqueza paleontológica, sorprendentes paisajes y deliciosos productos lácteos sin hormonas. Explora fósiles de dinosaurios y disfruta de la impresionante cultura, historia y gastronomía del lugar.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-IMuzquiz.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <span>Múzquiz</span>
                                <h3>coahuila</h3>
                                <p>Este pueblo mágico es un mosaico de cultura, historia y naturaleza, los origenes apuntan a 90 millones de años atras, evidencia de esto las encuentras en su museo de palentología, la presencia de etnias kikapúes y mascogos.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-IParras.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <span>Parras</span>
                                <h3>coahuila</h3>
                                <p>Parras de la fuente, un oasis en el desierto, con viñedos, nogales y calles históricas. Fundada hace más de 400 años, destaca por su arquitectura, gastronomía y las bodegas más antiguas del continente.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-IViesca.jpg') no-repeat;">
                        <div class="content">
                            <div class="container-transparent">
                                <span>Viesca</span>
                                <h3>coahuila</h3>
                                <p>La mayor atracción alrededor de viesca son las dunas de bilbao. originalmente cubierto por el mar, el paisaje se formó tras su retiro. este lugar histórico alberga la casa visitada por Miguel Hidalgo en 1811 y posteriormente por el presidente Benito Juárez.</p>
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

    <!-- sección adn inicio -->

    <section class="category">

        <h1 class="heading">ADN de la empresa</h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('ImgInicio/mision.jpg') }}" alt="">
                <h3>Misión</h3>
                <p>Ser una empresa turística con calidez y calidad en beneficio de nuestros viajeros, diseñando experiencia únicas, a precios accesibles y superando las expectativas de nuestros clientes.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/vision.jpg') }}" alt="">
                <h3>Visión</h3>
                <p>Llegar a ser una agencia integral reconocida a nivel nacional e internacional, incrementar la proyección de la operación de productos locales estables e innovadores, así como adaptar la tecnología de la información en todos nuestros procesos.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/valores.jpg') }}" alt="">
                <h3>Valores</h3>
                <p>Ética - Lealtad - Respeto - Solidaridad - Empatía - Compromiso - Honestidad.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/cultura.jpg') }}" alt="">
                <h3>Cultura</h3>
                <p>Nuestra cultura se basa en la excelencia, la integridad y el compromiso con nuestros clientes. Creemos en crear experiencias únicas e inolvidables, y nos enorgullece nuestra capacidad para superar las expectativas con cada viaje que organizamos.</p>
            </div>

        </div>

    </section>

    <!-- sección adn final -->

    <!-- sección sobre nosotros inicio -->

    <section class="about" id="about">

        <div class="image">
            <img src="{{ asset('ImgInicio/Img-SobreNosotros.png') }}" alt="">
        </div>

        <div class="content">
            <h3>¿Quiénes somos?</h3>
            <p>Somos una agencia integradora, transportista y tour operadora, que cuenta con más de 20 años de experiencia en el Trámite de Visas, Renta de Unidades, Viajes Vacacionaes a nivel Nacional, Locales (Coahuila y Durango) y a Estados Unidos (McAllen, San Antonio, Eagle Pass e Isla del Padre).</p>
            <p>Tenemos como principal objetivo crear y desarrollar productos turísticos con los más altos estándares de calidad y servicio a nuestros clientes, creando experiencias únicas e inolvidables.</p>
            <p>¡En Turismo <Link:print></Link:print>os Ángeles nos aseguramos de que tu viaje sea una experiencia increíble!</p>
        </div>

    </section>

    <!-- sección sobre nosotros final -->

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
                <a href="https://www.google.com/maps/search/?api=1&query=25.539489240121423,-103.45462295777837" target="_blank"> <i class="fas fa-map"></i>  Av Morelos 482, Primero de Cobián Centro, 27000 Torreón, Coah. </a> 
            </div>

            <div class="box">
                <h3>Siguenos</h3>
                <a href="https://www.facebook.com/TurismoLosAngeless/?locale=es_LA" target="_blank"> <i class="fab fa-facebook"></i> Facebook </a>
                <a href="https://wa.me/8712174806" target="_blank"> <i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.instagram.com/turismolosangeles1/?hl=es-la" target="_blank"> <i class="fab fa-instagram"></i> Instagram </a>
            </div>

        </div>

        <div class="credit">Copyright © 2024 <span>Turismo Los Angeles</span> | Todos los derechos reservados.</div>

    </section>
    
    <!-- sección píe de página final -->


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/inicio.js') }}"></script>

</body>
</html>