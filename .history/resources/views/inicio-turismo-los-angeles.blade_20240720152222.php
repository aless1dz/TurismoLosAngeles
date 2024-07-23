<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

        <!-- Encabezado Turismo Los Angeles -->
        <header>
            <a href="#" class="brand">Turismo Los Angeles</a>
            <div class="menu-btn"></div>
            <div class="navigation">
                <div class="navigation-items">
                    @guest
                    <a href="#">Inicio</a>
                    <a href="#">Visas</a>
                    <a href="#">Galería</a>
                    <a href="#">Contacto</a>
                    <a href="/iniciar-sesion">Iniciar Sesión</a>
                    @endguest
                </div>
            </div>
        </header>
        <!-- Final Encabezado Turismo Los Angeles -->

           <!-- Sección Videos Turismo Los Angeles -->
    <section class="home">
        <video class="video-slide active" src="{{ asset('videosInicio/arteaga.mp4') }}" autoplay muted loop></video>
        <video class="video-slide" src="Videos/general.mp4" autoplay muted loop></video>
        <video class="video-slide" src="Videos/huasteca.mp4" autoplay muted loop></video>
        <video class="video-slide" src="Videos/riu.mp4" autoplay muted loop></video>
        <video class="video-slide" src="Videos/angeles.mp4" autoplay muted loop></video>
        <div class="content active">
            <h1>Arteaga.<br><span>Coahuila</span></h1>
            <p>Un Pueblo Mágico en medio de una inmensa zona de bosques con pinos y valles de manzanos de los más impresionantes del país. Poseedor de un clima sumamente agradable donde predomina el viento fresco a cualquier hora del día. Arteaga es un destino que por sus bellos paisajes boscosos y cumbres nevadas en invierno, se considera "La Suiza de México".</p>
            <a href="#">Leer Más</a>
        </div>
        <div class="content">
            <h1>General Cepeda.<br><span>Coahuila</span></h1>
            <p>Lánzate a General Cepeda y descubre su riqueza palentológica, sus sorprendentes paisajes y sus deliciosos productos lácteos libres de hormonas. La riqueza cultural, histórica y gastronómica de Coahuila es simplemente impresionante. Prueba de ello la encontramos en General Cepeda, un encantador municipio en el que los fósiles de dinosaurio abundan. Descubre qué puedes hacer cuando lo visises.</p>
            <a href="#">Leer Más</a>
        </div>
        <div class="content">
            <h1>Huasteca Potosina.<br><span>S.L.P</span></h1>
            <p>Descubre la belleza natural y cultural de la Huasteca Potosina, un destino turístico impresionante ubicado en el estado de San Luis Potosí, México. Con sus majestuosas cascadas, ríos cristalinos, exuberantes selvas y formaciones rocosas únicas, la Huasteca Potosina te cautivará con su escenario de ensueño.</p>
            <a href="#">Leer Más</a>
        </div>
        <div class="content">
            <h1>RIU Mazatlán.<br><span>Sinaloa</span></h1>
            <p>Descubre RIU Mazatlán, un destino turístico excepcional ubicado en la hermosa ciudad costera de Mazatlán, México. Con sus playas de arena dorada, aguas cristalinas y un clima cálido durante todo el año, este resort te ofrece una experiencia vacacional inolvidable.</p>
            <a href="#">Leer Más</a>
        </div>
        <div class="content">
            <h1>Ángeles Locos.<br><span>Jalisco</span></h1>
            <p>El hotel Los Ángeles Locos es un hermoso complejo turístico ubicado en Tenacatita, Jalisco, en la costa del Pacífico de México. Con un diseño arquitectónico de estilo colonial mexicano, este hotel ofrece una experiencia única de hospedaje en un entorno natural impresionante.</p>
            <a href="#">Leer Más</a>
        </div>
        <div class="media-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="slider-navigation">
            <div class="nav-btn active"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
            <div class="nav-btn"></div>
        </div>
    </section>
    <!-- Final Sección Videos Turismo Los Angeles -->

    <script type="text/javascript" src="{{ asset('js/inicio.js')}}"></script>
    
</body>
</html>