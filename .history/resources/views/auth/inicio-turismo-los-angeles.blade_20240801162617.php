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
        </div>

    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- sección encabezado final -->

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
             <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label> 
        </form> 
    </div>

    <!-- sección principal inicio -->

    <section class="home" id="home">

        <div class="swiper home-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide">
    
                    <div class="box" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>arteaga</span>
                            <h3>coahuila</h3>
                            <p>arteaga, en la sierra madre oriental, es un pueblo mágico con bosques, manzanos y cumbres nevadas. ideal para ecoturismo, ofrece cabañas, senderismo, avistamiento de aves y paseos a caballo.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
    
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>cuatrociénegas</span>
                            <h3>coahuila</h3>
                            <p>cuatrociénegas es un pueblo mágico con historia, comida y vino. Alberga playas, pozos, ríos, mármol y montañas, formando uno de los oasis más peculiares y hermosos del mundo.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>general cepeda</span>
                            <h3>coahuila</h3>
                            <p>ofrece una riqueza paleontológica, sorprendentes paisajes y deliciosos productos lácteos sin hormonas. explora fósiles de dinosaurios y disfruta de la impresionante cultura, historia y gastronomía del lugar.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>múzquiz</span>
                            <h3>coahuila</h3>
                            <p>este pueblo mágico es un mosaico de cultura, historia y naturaleza, los origenes apuntan a 90 millones de años atras, evidencia de esto las encuentras en su museo de palentología, la presencia de etnias kikapúes y mascogos.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>termas de san joaquín</span>
                            <h3>coahuila</h3>
                            <p>En medio del desierto en Ramos Arizpe, Coahuila, un resort ofrece aguas termales con minerales como calcio, hierro y fósforo, conocidas por sus propiedades saludables milenarias.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box second" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>viesca</span>
                            <h3>coahuila</h3>
                            <p>la mayor atracción alrededor de viesca son las dunas de bilbao. originalmente cubierto por el mar, el paisaje se formó tras su retiro. este lugar histórico alberga la casa visitada por miguel hidalgo en 1811 y posteriormente por el presidente benito juárez.</p>
                            <a href="#" class="btn">leer más</a>
                        </div>
                    </div>
                </div>
    
                <div class="swiper-slide">
                    <div class="box" style="background: url('/ImgInicio/IMG-Prueba.jpg') no-repeat;">
                        <div class="content">
                            <span>parras</span>
                            <h3>coahuila</h3>
                            <p>parras de la fuente, un oasis en el desierto, con viñedos, nogales y calles históricas. fundada hace más de 400 años, destaca por su arquitectura, gastronomía y las bodegas más antiguas del continente</p>
                            <a href="#" class="btn">leer más</a>
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
                <a href="#" style="text-transform: none;"> <i class="fas fa-envelope"></i> turismolosangelespro@gmail.com </a>
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


    <script src="{{ asset('js/inicio.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>