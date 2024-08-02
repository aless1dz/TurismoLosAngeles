<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <i class="fas fa-user"></i> User
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                VISA
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Acompañantes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('units') }}">
                                Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities') }}">
                                Ciudades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('states') }}">
                                Estados
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('cost_tabulators') }}">
                                Tabla de Costos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Ciudades</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cityModal" onclick="clearForm()">
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
        </div>
    </div>

    
    <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="idstates">Estado</label>
                            <select class="form-control" id="idstates" name="idstates" required>
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
</body>
</html>
