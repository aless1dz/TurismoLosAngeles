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
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

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
        <a href="/mis-visas">Mis citas</a>

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
                            <span>arteaga</span>
                            <h3>coahuila</h3>
                            <p>arteaga, en la sierra madre oriental, es un pueblo mágico con bosques, manzanos y cumbres nevadas. ideal para ecoturismo, ofrece cabañas, senderismo, avistamiento de aves y paseos a caballo.</p>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-ICuatrocienegas.jpg') no-repeat;">
                        <div class="content">
                            <span>cuatrociénegas</span>
                            <h3>coahuila</h3>
                            <p>cuatrociénegas es un pueblo mágico con historia, comida y vino. Alberga playas, pozos, ríos, mármol y montañas, formando uno de los oasis más peculiares y hermosos del mundo.</p>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-IGeneralCepeda.jpg') no-repeat;">
                        <div class="content">
                            <span>general cepeda</span>
                            <h3>coahuila</h3>
                            <p>ofrece una riqueza paleontológica, sorprendentes paisajes y deliciosos productos lácteos sin hormonas. explora fósiles de dinosaurios y disfruta de la impresionante cultura, historia y gastronomía del lugar.</p>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-IMuzquiz.jpg') no-repeat;">
                        <div class="content">
                            <span>múzquiz</span>
                            <h3>coahuila</h3>
                            <p>este pueblo mágico es un mosaico de cultura, historia y naturaleza, los origenes apuntan a 90 millones de años atras, evidencia de esto las encuentras en su museo de palentología, la presencia de etnias kikapúes y mascogos.</p>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-IParras.jpg') no-repeat;">
                        <div class="content">
                            <span>parras</span>
                            <h3>coahuila</h3>
                            <p>parras de la fuente, un oasis en el desierto, con viñedos, nogales y calles históricas. fundada hace más de 400 años, destaca por su arquitectura, gastronomía y las bodegas más antiguas del continente</p>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-IViesca.jpg') no-repeat;">
                        <div class="content">
                            <span>viesca</span>
                            <h3>coahuila</h3>
                            <p>la mayor atracción alrededor de viesca son las dunas de bilbao. originalmente cubierto por el mar, el paisaje se formó tras su retiro. este lugar histórico alberga la casa visitada por miguel hidalgo en 1811 y posteriormente por el presidente benito juárez.</p>
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

        <h1 class="heading">aDN de la empresa</h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('ImgInicio/mision.jpg') }}" alt="">
                <h3>misión</h3>
                <p>ser una empresa turística con calidez y calidad en beneficio de nuestros viajeros, diseñando experiencia únicas, a precios accesibles y superando las expectativas de nuestros clientes.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/vision.jpg') }}" alt="">
                <h3>visión</h3>
                <p>llegar a ser una agencia integral reconocida a nivel nacional e internacional, incrementar la proyección de la operación de productos locales estables e innovadores, así como adaptar la tecnología de la información en todos nuestros procesos.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/valores.jpg') }}" alt="">
                <h3>valores</h3>
                <p>ética - lealtad - respeto - solidaridad - empatía - compromiso - honestidad.</p>
            </div>

            <div class="box">
                <img src="{{ asset('ImgInicio/cultura.jpg') }}" alt="">
                <h3>cultura</h3>
                <p>nuestra cultura se basa en la excelencia, la integridad y el compromiso con nuestros clientes. creemos en crear experiencias únicas e inolvidables, y nos enorgullece nuestra capacidad para superar las expectativas con cada viaje que organizamos.</p>
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
            <h3>¿quiénes somos?</h3>
            <p>somos una agencia integradora, transportista y tour operadora, que cuenta con más de 20 años de experiencia en el trámite de visas, renta de unidades, viajes vacacionaes a nivel nacional, locales (coahuila y durango) y a estados unidos (mcAllen, san antonio, eagle pass e isla del padre).</p>
            <p>tenemos como principal objetivo crear y desarrollar productos turísticos con los más altos estándares de calidad y servicio a nuestros clientes, creando experiencias únicas e inolvidables.</p>
            <p>¡en turismo los ángeles nos aseguramos de que tu viaje sea una experiencia increíble!</p>
        </div>

    </section>

    <!-- sección sobre nosotros final -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/inicio.js') }}"></script>
    {{-- <script>
        var swiper = new Swiper(".home-slider", {
            loop: true,
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script> --}}

</body>
</html>