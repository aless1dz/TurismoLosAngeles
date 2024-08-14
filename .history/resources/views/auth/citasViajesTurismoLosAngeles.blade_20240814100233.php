<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/citas.css') }}">
    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/bac15b686a.js" crossorigin="anonymous"></script>
    <!-- Librería iziToast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Citas Viajes | Turismo Los Angeles</title>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <a href="/citasPrincipal" class="container__logo"><img src="{{ asset('ImgCitas/IMG-Regresar.png') }}" alt="Logo Company"></a>
        </header>

        <!-- Section -->
        <section class="contact">
            <div class="contact__box">
                <h2 class="contact__title">Cita viajes</h2>
                <p>Complete la información solicitada y espera una respuesta.</p><br>
            </div>
            <form action="{{ route('store.viajes') }}" method="POST" id="contact-form" class="contact__form" autocomplete="off">
                @csrf
                <input type="hidden" id="form_type" name="form_type" value="viajes">
                <input type="hidden" id="status_form" name="status_form" value="pendiente">

                <div class="contact__inputs">
                    <label class="contact__label">Nombre</label>
                    <input type="text" name="user_name" id="user-name" class="contact__input" required oninput="validateName(this);">
                </div>
                <div class="contact__inputs">
                    <label class="contact__label">Correo electrónico</label>
                    <input type="email" name="user_email" id="user-email" class="contact__input" required autocapitalize="off" style="text-transform: none;">
                </div>
                <div class="contact__inputs">
                    <label class="contact__label">Fecha</label>
                    <input type="date" name="user_date" id="user-date" class="contact__input" required min="{{ date('Y-m-d') }}">
                </div>
                <div class="contact__inputs">
                    <label class="contact__label">Adultos que viajan</label>
                    <input type="number" name="user_adult" id="user-adult" class="contact__input" required min="1" oninput="this.value = Math.max(0, parseInt(this.value) || 0)">
                </div>
                <div class="contact__inputs">
                    <label class="contact__label">Niños que viajan</label>
                    <input type="number" name="user_kid" id="user-kid" class="contact__input"  min="1" oninput="this.value = Math.max(0, parseInt(this.value) || 0)">
                </div>
                @auth
                <button type="submit" class="contact__button">Enviar</button>
                @else
                <button type="button" class="contact__button" onclick="window.location.href='/iniciar-sesion';">iniciar sesión para enviar</button>
                @endauth
            </form>
         </section>

        <!-- Aside -->
         <aside class="info">
            <div class="info__little-box"></div>
            <h2 class="info__title">Información de contacto</h2>
            <ul class="info__list">
                <li class="info__list-item">
                    <i class="fas fa-envelope"></i>
                    <p class="info__list-item-description" style="text-transform: none;">turismolosangelespro@gmail.com</p>
                </li>
                <li class="info__list-item">
                    <i class="fas fa-phone"></i>
                    <p class="info__list-item-description">+871 217 4806</p>
                </li>
                <li class="info__list-item">
                    <i class="fas fa-map"></i>
                    <p class="info__list-item-description">Av morelos 482, primero de cobián centro, 27000 Torreón, Coah.</p>
                </li>
                <li class="info__list-item">
                    <i class="fas fa-clock"></i>
                    <p class="info__list-item-description">09:00 - 18:00</p>
                </li>
            </ul>
         </aside>

        <!-- Box -->
         <div class="container__box"></div>

        <!-- Redes Sociales -->
        <div class="container__rrss">
            <a href="https://www.facebook.com/TurismoLosAngeless/?locale=es_LA" target="_blank" class="container__rrss-item">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://wa.me/8712174806" target="_blank" class="container__rrss-item"> 
               <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.instagram.com/turismolosangeles1/?hl=es-la" target="_blank" class="container__rrss-item">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>

    <!-- Librería EmailJS -->
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <!-- Script Librería iziToast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <!-- Script para notificación -->
    <script>

        function validateName(input) {
            input.value = input.value.replace(/[^a-zA-ZñÑ\s]/g, '');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); 

                const formData = new FormData(form);
                const action = form.getAttribute('action');
                const method = form.getAttribute('method');
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                if (!csrfToken) {
                    iziToast.error({
                        title: 'Error',
                        message: 'Token CSRF no encontrado',
                        position: 'bottomCenter'
                    });
                    return;
                }

                fetch(action, {
                    method: method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        iziToast.success({
                            title: 'Éxito',
                            message: data.message,
                            position: 'bottomCenter'
                        });
                        form.reset(); // Limpia el formulario después de enviarlo
                    } else {
                        iziToast.error({
                            title: 'Error',
                            message: 'Hubo un problema al enviar el formulario',
                            position: 'bottomCenter'
                        });
                    }
                })
                .catch(error => {
                    iziToast.error({
                        title: 'Error',
                        message: 'Hubo un problema al enviar el formulario',
                        position: 'bottomCenter'
                    });
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
