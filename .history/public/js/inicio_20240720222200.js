const menuBtn = document.querySelector(".menu-btn");
        const navigation = document.querySelector(".navigation");

        menuBtn.addEventListener("click", () => {
            menuBtn.classList.toggle("active");
            navigation.classList.toggle("active");
        });

        //Javascript for video slider navigation
        const btns = document.querySelectorAll(".nav-btn");
        const slides = document.querySelectorAll(".video-slide");
        const contents = document.querySelectorAll(".content");

        var sliderNav = function(manual){
            btns.forEach((btn) => {
                btn.classList.remove("active");
            });

            slides.forEach((slide) => {
                slide.classList.remove("active");
            });

            contents.forEach((content) => {
                content.classList.remove("active");
            });

            btns[manual].classList.add("active");
            slides[manual].classList.add("active");
            contents[manual].classList.add("active");
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () =>{
                sliderNav(i);
            });
        });
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
                document.getElementById('logout-form').submit();
            }
        }

        $(document).ready(function() {
            $('#logout-button').click(function(e) {
                e.preventDefault(); // Previene el comportamiento por defecto del botón
                
                if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
                    $.ajax({
                        url: '{{ route('logout') }}', // URL del endpoint para cerrar sesión
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF para la solicitud
                            'Content-Type': 'application/json' // Tipo de contenido JSON
                        },
                        success: function(response) {
                            window.location.href = '/'; // Redirige a la página de inicio
                        },
                        error: function(xhr, status, error) {
                            alert('Error al cerrar sesión. Por favor, inténtelo de nuevo.');
                        }
                    });
                }
            });
        });