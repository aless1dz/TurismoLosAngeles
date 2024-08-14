<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

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
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar sesión
        </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
    <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
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
                            <a class="nav-link" href="{{ route('citas') }}">
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities') }}">
                                <i class="bi bi-building"></i> Ciudades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('states') }}">
                                <i class="bi bi-map-fill"></i> Estados
                            </a>
                        </li> -->
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
                        <!-- <li class="nav-item">
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
                        </li> -->
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
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="bi bi-airplane"></i> Gestionar Usuarios
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('visas') }}">
                                <i class="bi bi-file-earmark-text-fill"></i> Citas para Visas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('destinations') }}">
                                Destinos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cost_tabulators') }}">
                                Tabla de Costos
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Destinos</h1>
            </div>
            
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#destinationModal" onclick="clearForm()">
                    <i class="bi bi-plus-lg"></i> Añadir Destinos
                </button>

                <a href="mailto:mm0673222@gmail.com?subject=Asunto%20del%20email&body=Este%20es%20el%20cuerpo%20del%20email" class="btn btn-primary">
                    Enviar Email
                </a>

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
                            <th>Abreviatura</th>
                            <th>Ciudad</th>
                            <th>Estado</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="destinationTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="destinationModal" tabindex="-1" aria-labelledby="destinationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="destinationForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="destinationModalLabel">Añadir/Editar Destino</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="iddestinations" name="id">
                    <div class="form-group">
                        <label for="destination_acronym">Abreviatura</label>
                        <input type="text" class="form-control" id="destination_acronym" name="destination_acronym" required>
                    </div>
                    <div class="form-group">
                        <label for="idstates">Estado</label>
                        <select class="form-control" id="idstates" name="idstates" required></select>
                    </div>
                    <div class="form-group">
                        <label for="idcities">Ciudad</label>
                        <select class="form-control" id="idcities" name="idcities" required></select>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var destinations = [];
    var cities = [];
    var states = [];

    $(document).ready(function () {
        fetchDestinations();
        fetchStates();

        $('#idstates').change(function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-cities-by-state') }}/" + stateID,
                    success: function(res){
                        if(res){
                            $("#idcities").empty();
                            $("#idcities").append('<option value="">Seleccione una ciudad</option>');
                            $.each(res, function(key, value){
                                $("#idcities").append('<option value="'+key+'">'+value+'</option>');
                            });
                        } else {
                            $("#idcities").empty();
                        }
                    }
                });
            } else {
                $("#idcities").empty();
            }
        });

        $('#destinationForm').on('submit', function (e) {
            e.preventDefault();

            let id = $('#iddestinations').val();
            let url = id ? `/update/destination/${id}` : '/insert/destination';
            let method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: $('#destinationForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#destinationModal').modal('hide');
                    fetchDestinations();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $('#search-btn').on('click', function () {
            applyFilters();
        });
    });

    function fetchDestinations(order = 'asc') {
        $.get(`/get/destinations?order=${order}`, function (data) {
            destinations = data;
            renderDestinations(destinations);
        });
    }

    function renderDestinations(data) {
        let tableBody = $('#destinationTableBody');
        tableBody.empty();
        data.forEach(destination => {
            let createdAt = new Date(destination.created_at).toLocaleString();
            let updatedAt = new Date(destination.updated_at).toLocaleString();
            tableBody.append(`
                <tr>
                    <td>${destination.iddestinations}</td>
                    <td>${destination.destination_acronym}</td>
                    <td>${destination.city ? destination.city.name : 'N/A'}</td>
                    <td>${destination.state ? destination.state.name : 'N/A'}</td>
                    <td>${createdAt}</td>
                    <td>${updatedAt}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editDestination(${destination.iddestinations})"><i class="bi bi-pencil-fill"></i></button>
                        <button class="btn btn-danger" onclick="deleteDestination(${destination.iddestinations})"><i class="bi bi-backspace-fill"></i></button>
                    </td>
                </tr>
            `);
        });
    }

    function applyFilters() {
        let searchValue = $('#search-input').val().toLowerCase();
        let filteredDestinations = destinations.filter(destination => {
            let match = true;
            if (searchValue) {
                match = destination.city && destination.city.name.toLowerCase().includes(searchValue) ||
                        destination.state && destination.state.name.toLowerCase().includes(searchValue);
            }
            return match;
        });
        renderDestinations(filteredDestinations);
    }

    function fetchCities() {
        $.get('/get/cities', function (data) {
            cities = data;
            let citySelect = $('#idcities');
            citySelect.empty();
            cities.forEach(city => {
                citySelect.append(`<option value="${city.idcities}">${city.name}</option>`);
            });
        });
    }

    function fetchStates() {
        $.get('/get/states', function (data) {
            states = data;
            let stateSelect = $('#idstates');
            stateSelect.empty();
            states.forEach(state => {
                stateSelect.append(`<option value="${state.idstates}">${state.name}</option>`);
            });
        });
    }

    function editDestination(id) {
        $.get(`/get/destination/${id}`, function (destination) {
            $('#iddestinations').val(destination.iddestinations);
            $('#destination_acronym').val(destination.destination_acronym);
            $('#idcities').val(destination.cities_idcities);
            $('#idstates').val(destination.states_idstates);
            $('#destinationModal').modal('show');
        });
    }

    function deleteDestination(id) {
        $.ajax({
            url: `/delete/destination/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'DELETE',
            success: function () {
                fetchDestinations();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function clearForm() {
        $('#iddestinations').val('');
        $('#destinationForm')[0].reset();
    }
</script>
</body>
</html>
