<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Administracion</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/administracion.css') }}">
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="key"></ion-icon>
                <span>Admin</span>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="#">
                        <ion-icon name="airplane"></ion-icon>
                        <span>Viajes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="subway"></ion-icon>
                        <span>Renta Unidades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="id-card-outline"></ion-icon>
                        <span>VISA</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="person"></ion-icon>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="people"></ion-icon>
                        <span>Acompañantes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="bus"></ion-icon>
                        <span>Unidades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="location-outline"></ion-icon>
                        <span>Ciudades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="location-outline"></ion-icon>
                        <span>Estados</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="cash"></ion-icon>
                        <span>Tabla de Costos</span>
                    </a>
                </li>
                
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <img src="Jhampier.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre">Jhampier</span>
                        <span class="email">jhampier@gmail.com</span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>

    </div>
  
    <main>

        <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h1 class="h2">Ciudades</h1>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <button type="button" class="hola" data-toggle="modal" data-target="#cityModal" onclick="clearForm()">
                    Añadir Ciudad
                </button>
                <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
            </div>

            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Fecha de Creacion</th>
                        <th>Fecha de Actualizacion</th>
                        <th>Editar/Eliminar</th>
                    </tr>
                </thead>
                <tbody id="cityTableBody">
                    
                </tbody>
            </table>
        </div>

        <section class="modal ">
            <div class="modal__container">
                <h2 class="modal__title">Añadir/Editar ciudad</h2>
                <div class="modal-body">
                    <input type="hidden" id="idcities" name="idcities">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="idstates">Estado</label>
                        <select class="form-control" id="idstates" name="idstates" required>
                            
                        </select>
                    </div>
                </div>
                <div class="button-container">
                    <a href="#" class="modal__close">Cerrar</a>
                    <a href="#" class="modal__save">Guardar</a>
                </div>                  
            </div>
        </section>

    </main>
    

   
    <script>
        var cities = [];
        var states = [];

        $(document).ready(function () {
            fetchCities();
            fetchStates();

            $('#cityForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idcities').val();
                let url = id ? `/cities/update/${id}` : '/cities/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#cityModal').modal('hide');
                        fetchCities();
                    }
                });
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                });

            });

            $('#search-btn').on('click', function () {
                let searchTerm = $('#search-input').val().toLowerCase();
                let filteredCities = cities.filter(city => city.name.toLowerCase().includes(searchTerm));
                renderCities(filteredCities);
            });
        });

        function fetchCities() {
            $.getJSON('/cities/all', function (data) {
                cities = data;
                renderCities(cities);
            });
        }

        function fetchStates() {
            $.getJSON('/states/all', function (data) {
                states = data;
                renderStates(states);
            });
        }

        function renderCities(data) {
            let tableBody = $('#cityTableBody');
            tableBody.empty();
            data.forEach(city => {
                let createdAt = new Date(city.created_at).toLocaleString();
                let updatedAt = new Date(city.updated_at).toLocaleString();
                tableBody.append(`
                    <tr>
                        <td>${city.idcities}</td>
                        <td>${city.name}</td>
                        <td>${city.state ? city.state.name : 'N/A'}</td>
                        <td>${createdAt}</td>
                        <td>${updatedAt}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editCity(${city.idcities})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteCity(${city.idcities})"><i class="bi bi-backspace-fill"></i></button>
                        </td>
                    </tr>
                `);
            });
        }

        function renderStates(states) {
            let stateSelect = $('#idstates');
            stateSelect.empty();
            states.forEach(state => {
                stateSelect.append(`<option value="${state.idstates}">${state.name}</option>`);
            });
        }

        function editCity(id) {
            let city = cities.find(city => city.idcities == id);
            $('#idcities').val(city.idcities);
            $('#name').val(city.name);
            $('#idstates').val(city.states_idstates);
            $('#cityModal').modal('show');
        }

        function deleteCity(id) {
        if (confirm('¿Estás seguro de que quieres eliminar esta ciudad?')) {
        $.ajax({
            url: `/cities/delete/${id}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                fetchCities();
            },
            error: function (error) {
                console.log(error);
            }
            });
            }
        }

        function clearForm() {
            $('#cityForm')[0].reset();
            $('#idcities').val('');
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/administracion.js') }}"></script>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
=======
    <title>Admin - Turismo Los Ángeles</title>
>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
        }
        .navbar {
            background-color: #35424a;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .sidebar {
            background-color: #2c3e50;
            color: #ffffff;
            min-height: 100vh;
            padding-top: 1rem;
        }
        .sidebar .nav-link {
            color: #bdc3c7;
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #2255c4;
            color: #ffffff;
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }
        .table-responsive {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table thead th {
            background-color: #34495e;
            color: #ffffff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .table tbody tr:hover {
            background-color: #eaeaea;
        }
        .table tbody tr td {
            vertical-align: middle;
        }
        .btn {
            background-color: #2255c4;
            border-color: #2255c4;
        }
        .btn:hover {
            background-color: #1f4aaa;
        }
        .btn-warning, .btn-danger {
            padding: 0.375rem 0.75rem;
        }
        .btn-warning i, .btn-danger i {
            font-size: 1.2rem;
        }
        .modal-content {
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .modal-header {
            background-color: #2255c4;
            color: #ffffff;
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #2255c4;
        }
        .modal-footer .btn-secondary {
            background-color: #7f8c8d;
        }
        .modal-footer .btn-primary {
            background-color: #2255c4;
            border-color: #2255c4;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="/">Turismo Los Ángeles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> User
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5 class="sidebar-heading">Admin</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link active" href="/dashboard">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trips') }}">
                                <i class="bi bi-geo-alt"></i> Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                <i class="bi bi-calendar3"></i> Citas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bi bi-people-fill"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                <i class="bi bi-person-hearts"></i> Acompañantes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('units') }}">
                                <i class="bi bi-bus-front-fill"></i> Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities') }}">
                                <i class="bi bi-building"></i> Ciudades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('states') }}">
                                <i class="bi bi-map-fill"></i> Estados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('destinations') }}">
                                <i class="bi bi-map"></i> Destinos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cost_tabulators') }}">
                                <i class="bi bi-currency-dollar"></i> Tabla de Costos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pasaportes') }}">
                                <i class="bi bi-card-checklist"></i> Citas Pasaportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cotizaciones') }}">
                                <i class="bi bi-file-earmark-text"></i> Citas Cotizaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('comentarios') }}">
                                <i class="bi bi-chat-left-dots"></i> Comentarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rentas') }}">
                                <i class="bi bi-car-front-fill"></i> Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('viajes') }}">
                                <i class="bi bi-airplane"></i> Solicitud de Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visas') }}">
                                <i class="bi bi-file-earmark-text-fill"></i> Citas para Visas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ciudades</h1>
                </div>
                
                <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cityModal" onclick="clearForm()">
                        <i class="bi bi-plus-lg"></i> Añadir Ciudad
                    </button>
                    <div class="input-group w-50">
                        <input type="text" id="search-input" class="form-control" placeholder="Buscar por nombre...">
                        <div class="input-group-append">
                            <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Editar/Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="cityTableBody">
                            <!-- Contenido de las ciudades -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="cityForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="cityModalLabel">Añadir/Editar Ciudad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idcities" name="idcities">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="idstates">Estado</label>
                            <select class="form-control" id="idstates" name="idstates" required>
                                <!-- Opciones de estados -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var cities = [];
        var states = [];

        $(document).ready(function () {
            fetchCities();
            fetchStates();

            $('#cityForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idcities').val();
                let url = id ? /cities/update/${id} : '/cities/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#cityModal').modal('hide');
                        fetchCities();
                    }
                });
            });

            $('#search-btn').on('click', function () {
                let searchTerm = $('#search-input').val().toLowerCase();
                let filteredCities = cities.filter(city => city.name.toLowerCase().includes(searchTerm));
                renderCities(filteredCities);
            });
        });

        function fetchCities() {
            $.getJSON('/cities/all', function (data) {
                cities = data;
                renderCities(cities);
            });
        }

        function fetchStates() {
            $.getJSON('/states/all', function (data) {
                states = data;
                renderStates(states);
            });
        }

        function renderCities(data) {
            let tableBody = $('#cityTableBody');
            tableBody.empty();
            data.forEach(city => {
                let createdAt = new Date(city.created_at).toLocaleString();
                let updatedAt = new Date(city.updated_at).toLocaleString();
                tableBody.append(`
                    <tr>
                        <td>${city.idcities}</td>
                        <td>${city.name}</td>
                        <td>${city.state ? city.state.name : 'N/A'}</td>
                        <td>${createdAt}</td>
                        <td>${updatedAt}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editCity(${city.idcities})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteCity(${city.idcities})"><i class="bi bi-backspace-fill"></i></button>
                        </td>
                    </tr>
                `);
            });
        }

        function renderStates(states) {
            let stateSelect = $('#idstates');
            stateSelect.empty();
            states.forEach(state => {
                stateSelect.append(<option value="${state.idstates}">${state.name}</option>);
            });
        }

        function editCity(id) {
            let city = cities.find(city => city.idcities == id);
            $('#idcities').val(city.idcities);
            $('#name').val(city.name);
            $('#idstates').val(city.states_idstates);
            $('#cityModal').modal('show');
        }

        function deleteCity(id) {
            if (confirm('¿Estás seguro de que quieres eliminar esta ciudad?')) {
                $.ajax({
                    url: /cities/delete/${id},
                    type: 'DELETE',
                    success: function (response) {
                        fetchCities();
                    }
                });
            }
        }

        function clearForm() {
            $('#cityForm')[0].reset();
            $('#idcities').val('');
        }
    </script>
</body>
<<<<<<< HEAD
</html> --}}
=======
</html>

>>>>>>> 180dae9d5b61f2d3d134cace068243052493d5bd
