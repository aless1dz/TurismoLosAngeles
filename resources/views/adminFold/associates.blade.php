<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
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
                <h1 class="h2">Acompañantes</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#associateModal" onclick="clearForm()">
                        Añadir Acompañante
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
                                <th>Apellidos</th>
                                <th>Fecha Nacimiento</th>
                                <th>Editar/Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="associateTableBody">
                            <!-- Contenido de los acompañantes -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="associateModal" tabindex="-1" aria-labelledby="associateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="associateForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="associateModalLabel">Añadir/Editar Acompañante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idassociates" name="idassociates">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var associates = [];

        $(document).ready(function () {
            fetchAssociates();

            $('#associateForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idassociates').val();
                let url = id ? `/update/associate/${id}` : '/insert/associate';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: $('#associateForm').serialize(),
                    success: function (response) {
                        $('#associateModal').modal('hide');
                        fetchAssociates();
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

        function fetchAssociates() {
            $.get(`/get/associates`, function (data) {
                associates = data;
                renderAssociates(associates);
            });
        }

        function renderAssociates(data) {
            let tableBody = $('#associateTableBody');
            tableBody.empty();
            data.forEach(associate => {
                tableBody.append(`
                    <tr>
                        <td>${associate.idassociates}</td>
                        <td>${associate.name}</td>
                        <td>${associate.last_name}</td>
                        <td>${associate.birthdate}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editAssociate(${associate.idassociates})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteAssociate(${associate.idassociates})"><i class="bi bi-backspace-fill"></i></button>
                        </td>
                    </tr>
                `);
            });
        }

        function applyFilters() {
            let searchValue = $('#search-input').val().toLowerCase();
            
            let filteredAssociates = associates.filter(function (associate) {
                let match = true;

                if (searchValue) {
                    match = associate.nombre.toLowerCase().includes(searchValue) ||
                            associate.last_name.toLowerCase().includes(searchValue);
                }

                return match;
            });

            renderAssociates(filteredAssociates);
        }

        function editAssociate(id) {
            $.get(`/get/associate/${id}`, function (associate) {
                $('#idassociates').val(associate.idassociates);
                $('#name').val(associate.name);
                $('#last_name').val(associate.last_name);
                $('#birthdate').val(associate.birthdate);
                $('#associateModal').modal('show');
            });
        }

        function deleteAssociate(id) {
            $.ajax({
                url: `/delete/associate/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'DELETE',
                success: function () {
                    fetchAssociates();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function clearForm() {
            $('#idassociates').val('');
            $('#associateForm')[0].reset();
        }
    </script>
</body>
</html>
