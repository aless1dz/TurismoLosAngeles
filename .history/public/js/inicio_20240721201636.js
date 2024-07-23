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
        
            Swal.fire({
                title: '¿Estás seguro de que quieres cerrar sesión?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('{{ route("/logout") }}', {             
                       method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire(
                                'Cerrado',
                                'Tu sesión ha sido cerrada.',
                                'success'
                            ).then(() => {
                                window.location.href = '/';
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Error al cerrar sesión. Por favor, inténtelo de nuevo.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error',
                            'Error al cerrar sesión. Por favor, inténtelo de nuevo.',
                            'error'
                        );
                    });
                }
            });
        }
        
        