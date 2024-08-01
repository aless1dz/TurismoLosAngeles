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
                            <a class="nav-link" href="{{ route('associates') }}">
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
                    </ul>
                </div>
            </nav>

            <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <h1 class="h2">Tabla de costos</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cost_TabulatorModal" onclick="clearForm()">
                        Añadir
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>

                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Destino (Abreviatura)</th>
                            <th>Precio Unico</th>
                            <th>Precio de mayoreo</th>
                            <th>Descripcion</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualizacion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="cost_TabulatorTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cost_TabulatorModal" tabindex="-1" aria-labelledby="cost_TabulatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="cost_TabulatorForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="cost_TabulatorModalLabel">Añadir/Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idcost_tabulators" name="idcost_tabulators">
                        <div class="form-group">
                            <label for="iddestinations">Destino</label>
                            <select class="form-control" id="iddestinations" name="iddestinations" required>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Precio Unico</label>
                            <input type="number" class="form-control" id="unit_price" name="unit_price" required>
                        </div>
                        <div class="form-group">
                            <label for="bulk_price">Precio al por Mayor</label>
                            <input type="number" class="form-control" id="bulk_price" name="bulk_price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input type="text" class="form-control" id="description" name="description" required>
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
        var cost_tabulators = [];
        var destinations = [];

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetchCost_Tabulators();
            fetchDestinations();

            $('#cost_TabulatorForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idcost_tabulators').val();
                let url = id ? `/cost_tabulators/update/${id}` : '/cost_tabulators/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#cost_TabulatorModal').modal('hide');
                        fetchCost_Tabulators();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    
                    }
                });
            });

            $('#search-btn').on('click', function () {
                let searchTerm = $('#search-input').val().toLowerCase();
                let filteredCost_Tabulators = cost_tabulators.filter(cost_tabulator => cost_tabulator.destination_acronym.toLowerCase().includes(searchTerm));
                renderCost_Tabulators(filteredCost_Tabulators);
            });
        });

        function fetchCost_Tabulators() {
            $.getJSON('/cost_tabulators/all', function (data) {
                cost_tabulators = data;
                renderCost_Tabulators(cost_tabulators);
            });
        }

        function fetchDestinations() {
            $.getJSON('/destinations/all', function (data) {
                destinations = data;
                renderDestinations(destinations);
            });
        }

        function renderCost_Tabulators(data) {
            let tableBody = $('#cost_TabulatorTableBody');
            tableBody.empty();
            data.forEach(cost_tabulator => {
                let createdAt = new Date(cost_tabulator.created_at).toLocaleString();
                let updatedAt = new Date(cost_tabulator.updated_at).toLocaleString();
                tableBody.append(`
                    <tr>
                        <td>${cost_tabulator.idcost_tabulators}</td>
                        <td>${cost_tabulator.destination ? cost_tabulator.destination.destination_acronym : 'N/A'}</td>
                        <td>${cost_tabulator.unit_price}</td>
                        <td>${cost_tabulator.bulk_price}</td>
                        <td>${cost_tabulator.description}</td>
                        <td>${createdAt}</td>
                        <td>${updatedAt}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editCost_Tabulator(${cost_tabulator.idcost_tabulators})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteCost_Tabulator(${cost_tabulator.idcost_tabulators})"><i class="bi bi-backspace-fill"></i></button>
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

        function editCost_Tabulator(id) {
            let cost_tabulator = cost_tabulators.find(cost_tabulator => cost_tabulator.idcost_tabulators == id);
            $('#idcost_tabulators').val(cost_tabulator.idcost_tabulators);
            $('#iddestinations').val(cost_tabulator.destinations_iddestinations);
            $('#unit_price').val(cost_tabulator.unit_price);
            $('#bulk_price').val(cost_tabulator.bulk_price);
            $('#description').val(cost_tabulator.description);
            $('#cost_TabulatorModal').modal('show');
        }

        function deleteCost_Tabulator(id) {
            if (confirm('Estas seguro de eliminar?')) {
                $.ajax({
                    url: `/cost_tabulators/delete/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        fetchCost_Tabulators();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        alert('Error al eliminar. Intenta de nuevo.');
                    }
                });
            }
        }

        function clearForm() {
            $('#cost_TabulatorForm')[0].reset();
            $('#idcost_tabulators').val('');
        }
    </script>
</body>
</html>
