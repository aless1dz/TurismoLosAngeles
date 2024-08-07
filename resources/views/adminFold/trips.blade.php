<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        <!-- Resto del contenido del navbar -->
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
                <h1 class="h2">Viajes (Historial)</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tripModal" onclick="clearForm()">
                        Añadir Viaje
                    </button>
                    <button id="exportBtn" class="btn btn-primary">Exportar a Excel</button>
                    <div class="input-group w-50">
                        <input type="text" id="search-input" class="form-control" placeholder="Buscar por nombre...">
                        <div class="input-group-append">
                            <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tripTable" class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Destino</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Duración (Días)</th>
                                <th>Costo (Unico o Mayoreo)</th>
                                <th>Usuario</th>
                                <th>Fecha de Creacion</th>
                                <th>Fecha de Actualizacion</th>
                                <th>Editar/Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tripTableBody">
                            <!-- Contenido de los viajes -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tripModal" tabindex="-1" aria-labelledby="tripModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="tripForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tripModalLabel">Añadir/Editar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idtrips" name="idtrips">
                        <div class="form-group">
                            <label for="iddestinations">Destino</label>
                            <select class="form-control" id="iddestinations" name="iddestinations" required>
                                <option value="" disabled selected>Seleccione un destino</option>
                                <!-- Las opciones serán cargadas aquí -->

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Fecha de Fin</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duración (Días)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="form-group">
                            <label for="idcost_tabulators">Costo (Unico o Mayoreo)</label>
                            <select class="form-control" id="idcost_tabulators" name="idcost_tabulators" required>
                                <option value="" disabled selected>Seleccione un costo</option>
                                <!-- Las opciones serán cargadas aquí -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idusers">Cliente</label>
                            <select class="form-control" id="idusers" name="idusers" required></select>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var trips = [];
        var destinations = [];
        var users = [];
        var cost_tabulators = [];

        $(document).ready(function () {
            fetchTrips();
            fetchCost_Tabulators();
            fetchDestinations();
            fetchUsers();

            $('#tripForm').on('submit', function (e) {
                e.preventDefault();

                console.log($('#tripForm').serialize());

                let id = $('#idtrips').val();
                let url = id ? `/trips/update/${id}` : '/trips/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: $('#tripForm').serialize(),
                    success: function (response) {
                        $('#tripModal').modal('hide');
                        fetchTrips();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            // $('#search-btn').on('click', function () {
            //     applyFilters();
            // });
        });

        function fetchTrips(order = 'asc') {
            $.get(`/get/trips?order=${order}`, function (data) {
                trips = data;
                renderTrips(trips);
            });
        }

        
        function fetchDestinations() {
            $.getJSON('/destinations/all', function (data) {
                destinations = data;
                renderDestinations(destinations);
            });
        }

        function fetchCost_Tabulators() {
            $.getJSON('/cost_tabulators/all', function (data) {
                cost_tabulators = data;
                renderCost_Tabulators(cost_tabulators);
            });
        }

        function fetchUsers() {
            $.getJSON('/users/all', function (data) {
                users = data;
                renderUsers(users);
            });
        }

        function renderTrips(data) {
            let tableBody = $('#tripTableBody');
            tableBody.empty();
            data.forEach(trip => {
                let createdAt = new Date(trip.created_at).toLocaleString();
                let updatedAt = new Date(trip.updated_at).toLocaleString();
                let destinationInfo = trip.destination ? `${trip.destination.destination_acronym}` : 'N/A';
                let costInfo = trip.cost_tabulator ? `${trip.cost_tabulator.unit_price}  ${trip.cost_tabulator.bulk_price}` : 'N/A';
                let userInfo = trip.user ? `${trip.user.name} ${trip.user.last_name}` : 'N/A';

                tableBody.append(`
                    <tr>
                        <td>${trip.idtrips}</td>
                        <td>${destinationInfo}</td>
                        <td>${trip.start_date}</td>
                        <td>${trip.end_date}</td>
                        <td>${trip.duration}</td>
                        <td>${costInfo}</td>
                        <td>${userInfo}</td>
                        <td>${createdAt}</td>
                        <td>${updatedAt}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editTrip(${trip.idtrips})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteTrip(${trip.idtrips})"><i class="bi bi-backspace-fill"></i></button>
                        </td>
                    </tr>
                `);
            });
        }

        function renderDestinations(destinations) {
            let destinationSelect = $('#iddestinations');
            destinationSelect.empty();
            destinations.forEach(destination => {
                destinationSelect.append(`<option value="${destination.iddestinations}">${destination.destination_acronym}</option>`);
            });
        }

        function renderUsers(users) {
            let userSelect = $('#idusers');
            userSelect.empty();
            users.forEach(user => {
                userSelect.append(`<option value="${user.id}">${user.name} ${user.last_name}</option>`);
            });
        }

        function renderCost_Tabulators(cost_tabulators) {
            let cost_tabulatorSelect = $('#idcost_tabulators');
            cost_tabulatorSelect.empty();
            cost_tabulators.forEach(cost_tabulator => {
                cost_tabulatorSelect.append(`<option value="${cost_tabulator.idcost_tabulators}">${cost_tabulator.unit_price}:${cost_tabulator.bulk_price}</option>`);
            });
        }

        function applyFilters() {
            let searchValue = $('#search-input').val().toLowerCase();

            let filteredTrips = trips.filter(function (trip) {
                let match = true;

                if (searchValue) {
                    match = trip.destination.toLowerCase().includes(searchValue) || trip.user.name.toLowerCase().includes(searchValue);
                }

                return match;
            });

            renderTrips(filteredTrips);
        }

        function editTrip(id) {
            $.get(`/get/trip/${id}`, function (trip) {
                $('#idtrips').val(trip.idtrips);
                $('#iddestinations').val(trip.iddestinations);
                $('#start_date').val(trip.start_date);
                $('#end_date').val(trip.end_date);
                $('#duration').val(trip.duration);
                $('#idcost_tabulators').val(trip.idcost_tabulators);
                $('#idusers').val(trip.idusers || '');
                $('#tripModal').modal('show');
            });
        }

        function deleteTrip(idtrips) {
            $.ajax({
                url: `/delete/trip/${idtrips}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'DELETE',
                success: function () {
                    fetchTrips();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        document.getElementById('exportBtn').addEventListener('click', function() {
            var table = document.getElementById('tripTable');
            var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
            XLSX.writeFile(wb, 'HistorialViajes.xlsx');
        });

        function clearForm() {
            $('#idtrips').val('');
            $('#tripForm')[0].reset();
        }
    </script>
</body>
</html>
