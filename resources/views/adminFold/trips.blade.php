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
                            <a class="nav-link" href="{{ route('units') }}">
                                <i class="bi bi-bus-front-fill"></i> Unidades
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
                            <a class="nav-link" href="{{ route('rentas') }}">
                                <i class="bi bi-car-front-fill"></i> Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('viajes') }}">
                                <i class="bi bi-airplane"></i> Solicitud de Viajes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Viajes</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tripModal" onclick="clearForm()">
                        Añadir Viaje
                    </button>
                    <button id="exportBtn" class="btn btn-primary">Exportar a Excel</button>
                    <div class="input-group w-50">
                        <input type="date" id="start-date" class="form-control" placeholder="Fecha de inicio">
                        <input type="date" id="end-date" class="form-control ml-2" placeholder="Fecha de fin">
                        <input type="text" id="search-input" class="form-control ml-2" placeholder="Buscar por nombre...">
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
                                <th>Cliente</th>
                                <th>Acompañantes</th>
                                <th>Precios</th>
                                <th>Asientos de Autobús</th>
                                <th>Numero de Telefono</th>
                                <th>Abono de Pago</th>
                                <th>Total</th>
                                <th>Observaciones</th>
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end" id="pagination">
                        <!-- Páginas de paginación se generarán aquí -->
                    </ul>
                </nav>
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
                                <option value="">Seleccione un Destino</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idusers">Cliente</label>
                            <select class="form-control" id="idusers" name="idusers" required>
                                <option value="" >Seleccione un Cliente</option>
                                <!-- Las opciones serán cargadas aquí -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idassociates">Acompañantes</label>
                            <select class="form-control" id="idassociates" name="idassociates[]" multiple required>
                                <!-- Las opciones serán cargadas aquí -->
                            </select>
                            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#associateModal">
                                Añadir Acompañante
                            </button>
                        </div>

                        <div class="form-group">
                            <label for="idcost_tabulators">Costo (Unico o Mayoreo)</label>
                            <select class="form-control" id="idcost_tabulators" name="idcost_tabulators" required>
                                <option value="">Seleccione un Costo</option>
                                <!-- Las opciones serán cargadas aquí -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bus_seats">Asientos de Autobús</label>
                            <input type="number" class="form-control" id="bus_seats" name="bus_seats" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="telephone_number">Número de Telefono</label>
                            <input type="number" class="form-control" id="telephone_number" name="telephone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_advance">Abono de Pago</label>
                            <input type="number" class="form-control" id="payment_advance" name="payment_advance" required>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="observations">Observaciones</label>
                            <input type="text" class="form-control" id="observations" name="observations" required>
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
    <div class="modal fade" id="associateModal" tabindex="-1" aria-labelledby="associateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="associateForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="associateModalLabel">Añadir Acompañante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Acompañante</button>
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
        var destinations =[];
        var cost_tabulators = [];
        var users =[];
        var associates =[];
        $(document).ready(function () {
            fetchTrips();
            fetchCost_Tabulators();
            fetchDestinations();
            fetchUsers();
            fetchAssociates();

            function updateBusSeatsAndTotal() {
                // Obtener el número de acompañantes seleccionados
                let numberOfAssociates = $('#idassociates option:selected').length;

                // Comprobar si se ha seleccionado un cliente
                let userSelected = $('#idusers').val() ? 1 : 0;

                // El número total de asientos es igual al número de acompañantes más el cliente (si está seleccionado)
                let totalSeats = numberOfAssociates + userSelected;

                // Actualizar el campo de asientos
                $('#bus_seats').val(totalSeats);

                // Obtener el precio unitario del costo seleccionado
                let unitPrice = $('#idcost_tabulators option:selected').text().split(':')[1];
                unitPrice = parseFloat(unitPrice); // Convertir a número

                // Verificar si el unitPrice es un número válido
                if (isNaN(unitPrice)) {
                    unitPrice = 0; // Si no es un número, asignar 0
                }

                // Calcular el total
                let totalAmount = totalSeats * unitPrice;

                // Actualizar el campo de total
                $('#total').val(totalAmount.toFixed(2));
            }

            // Llamar a la función cada vez que se seleccionan o deseleccionan acompañantes, o se selecciona un costo
            $('#idassociates, #idusers, #idcost_tabulators').on('change', function () {
                updateBusSeatsAndTotal();
            });

            // Llamar a la función al cargar el formulario para calcular los asientos y el total iniciales
            updateBusSeatsAndTotal();

            $('#associateForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/insert/associate', // Ruta para crear un nuevo acompañante
                    method: 'POST',
                    data: $('#associateForm').serialize(),
                    success: function (response) {
                        $('#associateModal').modal('hide');
                        fetchAssociates(); // Actualiza la lista de acompañantes en el formulario principal
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            $('#tripForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idtrips').val();
                let url = id ? `/trips/update/${id}` : '/trips/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: $('#tripForm').serialize(),
                    success: function (response) {
                        $('#tripModal').modal('hide');
                        fetchTrips(response.page);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

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

        function fetchAssociates(){
            $.getJSON('/associates/all', function (data) {
                associates = data;
                renderAssociates(associates);
            });
        }
        
        function fetchTrips() {
            $.getJSON('/trips/all', function (data) {
                console.log(data); 
                trips = data;
                renderTrips(trips);
            });
        }

        function renderTrips(data) {
            let tableBody = $('#tripTableBody');
            tableBody.empty();
            data.forEach(trip => {
                let createdAt = new Date(trip.created_at).toLocaleString();
                let updatedAt = new Date(trip.updated_at).toLocaleString();
                let destinationInfo = trip.destination ? `${trip.destination.destination_acronym}` : 'N/A';

                // Asegurarnos de que `trip.associates` sea un array antes de mapearlo
                let associateInfo = Array.isArray(trip.associates) && trip.associates.length > 0 
                    ? trip.associates.map(a => `${a.name} ${a.last_name}`).join(', ') 
                    : 'N/A'; 

                let costInfo = trip.cost_tabulator ? `${trip.cost_tabulator.price_description}  ${trip.cost_tabulator.unit_price} ` : 'N/A';
                let userInfo = trip.user ? `${trip.user.name} ${trip.user.last_name}` : 'N/A';

                tableBody.append(`
                    <tr>
                        <td>${trip.idtrips}</td>
                        <td>${destinationInfo}</td>
                        <td>${userInfo}</td>
                        <td>${associateInfo}</td>
                        <td>${costInfo}</td>
                        <td>${trip.bus_seats}</td>
                        <td>${trip.telephone_number}</td>
                        <td>${trip.payment_advance}</td>
                        <td>${trip.total}</td>
                        <td>${trip.observations}</td>
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

        function renderAssociates(associates) {
            let associateSelect = $('#idassociates');
            associateSelect.empty();
            associates.forEach(associate => {
                associateSelect.append(`<option value="${associate.idassociates}">${associate.name} ${associate.last_name} ${associate.birthdate}</option>`);
            });
        }

        function renderCost_Tabulators(cost_tabulators) {
            let cost_tabulatorSelect = $('#idcost_tabulators');
            cost_tabulatorSelect.empty();
            cost_tabulators.forEach(cost_tabulator => {
                cost_tabulatorSelect.append(`<option value="${cost_tabulator.idcost_tabulators}">${cost_tabulator.price_description}:${cost_tabulator.unit_price}</option>`);
            });
        }

        function applyFilters() {
    const searchValue = $('#search-input').val().toLowerCase();
    const startDate = new Date($('#start-date').val());
    const endDate = new Date($('#end-date').val());
    const rows = $('#tripTableBody tr');

    rows.each(function() {
        const row = $(this);
        const nameText = row.find('td:nth-child(3)').text().toLowerCase();
        const dateText = row.find('td:nth-child(11)').text();
        const tripDate = new Date(dateText);

        const matchesSearch = searchValue ? nameText.includes(searchValue) : true;
        const matchesDate = (!isNaN(startDate) && !isNaN(endDate)) 
            ? (tripDate >= startDate && tripDate <= endDate)
            : true;

        if (matchesSearch && matchesDate) {
            row.show();
        } else {
            row.hide();
        }
    });
}

$('#search-btn').on('click', function () {
    applyFilters();
});

$('#start-date, #end-date, #search-input').on('input', function () {
    applyFilters();
});


        function editTrip(id) {
            $.get(`/get/trip/${id}`, function (trip) {
                $('#idtrips').val(trip.idtrips);
                $('#iddestinations').val(trip.iddestinations);
                $('#idusers').val(trip.idusers );
                $('#idassociates').val(trip.idassociates);
                $('#idcost_tabulators').val(trip.idcost_tabulators);
                $('#bus_seats').val(trip.bus_seats);
                $('#telephone_number').val(trip.telephone_number);
                $('#payment_advance').val(trip.payment_advance);
                $('#total').val(trip.total);
                $('#observations').val(trip.observations);
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
