<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trips') }}">
                                Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Citas
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('destinations') }}">
                                Destinos
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

            <div class="col-md-10">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Viajes (Historial)</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tripModal" onclick="clearForm()">
                        Añadir Viaje
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>
                
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Destino</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Duración (Días)</th>
                            <th>Costo (Unico o Mayoreo)</th>
                            <th>Usuario</th>
                            <th>Contrato</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualizacion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tripTableBody">
                        
                    </tbody>
                </table>
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
                            <label for="duration">Duaración (Días)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="form-group">
                            <label for="idcost_tabulators">Costo (Unico o Mayoreo)</label>
                            <select class="form-control" id="idcost_tabulators" name="idcost_tabulators" required>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idusers">Cliente</label>
                            <select class="form-control" id="idusers" name="idusers" required>
                                
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

    $('#sort-asc').on('click', function () {
        fetchTrips('asc');
    });
    $('#sort-desc').on('click', function () {
        fetchTrips('desc');
    });

    $('#tripForm').on('submit', function (e) {
    e.preventDefault();

    let id = $('#idtrips').val();
    let url = id ? `/trips/update/${id}` : '/trips/insert';
    let method = id ? 'PUT' : 'POST';

    // Verificar que idusers tenga un valor válido
    let idusers = $('#idusers').val();
    if (idusers === 'undefined' || idusers === '') {
        alert('Por favor seleccione un usuario válido.');
        return;
    }

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


    $('#search-btn').on('click', function () {
        applyFilters();
    });
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
        let destinationInfo = trip.destination ? `${trip.destination.destination_acronym}`: 'N/A';
        let costInfo = trip.cost_tabulator ? `${trip.cost_tabulator.unit_price}  ${trip.cost_tabulator.bulk_price}` : 'N/A';
        let userInfo = trip.user ? `${trip.user.name} : ${trip.user.last_name}` : 'N/A';

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
                destinationSelect.append(`<option value="${destination.iddestinations}">${destination.destination_acronym} </option>`);
            });
        }
        function renderUsers(users) {
            let userSelect = $('#idusers');
            userSelect.empty();
            users.forEach(user => {
                userSelect.append(`<option value="${user.idusers}">${user.name}:${user.last_name} </option>`);
            });
        }
        function renderCost_Tabulators(cost_tabulators) {
            let cost_tabulatorSelect = $('#idcost_tabulators');
            cost_tabulatorSelect.empty();
            cost_tabulators.forEach(cost_tabulator => {
                cost_tabulatorSelect.append(`<option value="${cost_tabulator.idcost_tabulators}">${cost_tabulator.unit_price}:${cost_tabulator.bulk_price} </option>`);
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


function deleteTrip(id) {
    $.ajax({
        url: `/delete/trip/${id}`,
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

    function clearForm() {
        $('#idtrips').val('');
        $('#tripForm')[0].reset();
    }
    </script>
</body>
</html>
