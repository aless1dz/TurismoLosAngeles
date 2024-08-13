<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> User
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

            <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <h1 class="h2">Tabla de costos</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#costTabulatorModal" onclick="clearForm()">
                        Añadir
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
    </div>

    <div class="modal fade" id="costTabulatorModal" tabindex="-1" aria-labelledby="costTabulatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="costTabulatorForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="costTabulatorModalLabel">Añadir/Editar</h5>
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
                            <label for="unit_price">Precio Único</label>
                            <input type="number" class="form-control" id="unit_price" name="unit_price" required>
                        </div>
                        <div class="form-group">
                            <label for="bulk_price">Precio a Mayoreo</label>
                            <input type="number" class="form-control" id="bulk_price" name="bulk_price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" class="form-control" id="description" name="description" required>
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
        var cost_tabulators = [];
        var destinations = [];

        $(document).ready(function () {
            fetchCost_Tabulators();
            fetchDestinations();

            $('#costTabulatorForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idcost_tabulators').val();
                let url = id ? `/cost_tabulators/update/${id}` : '/cost_tabulators/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#costTabulatorModal').modal('hide');
                        fetchCost_Tabulators();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });

            
        });

        function fetchCost_Tabulators() {
    $.getJSON('/cost_tabulators/all', function (data) {
        console.log(data); 
        cost_tabulators = data;
        renderCost_Tabulators(cost_tabulators);
    });
}


function fetchDestinations() {
    $.getJSON('/destinations/all', function (data) {
        console.log(data);
        renderDestinations(data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error al obtener destinos:', textStatus, errorThrown);
    });
}

function renderDestinations(destinations) {
    let destinationSelect = $('#iddestinations');
    destinationSelect.empty();
    destinations.forEach(destination => {
        console.log(destination); 
        if (destination.iddestinations && destination.destination_acronym) {
            destinationSelect.append(`<option value="${destination.iddestinations}">${destination.destination_acronym}</option>`);
        } else {
            console.error('Datos de destino no válidos:', destination);
        }
    });
}



        function renderCost_Tabulators(data) {
            let tableBody = $('#cost_TabulatorTableBody');
            tableBody.empty();
            data.forEach(cost_tabulator => {
                let createdAt = new Date(cost_tabulator.created_at).toLocaleString();
                let updatedAt = new Date(cost_tabulator.updated_at).toLocaleString();
                let destinationAcronym = cost_tabulator.destination ? cost_tabulator.destination.destination_acronym : 'N/A';
                
                tableBody.append(`
                    <tr>
                        <td>${cost_tabulator.idcost_tabulators}</td>
                        <td>${destinationAcronym}</td>
                        <td>${cost_tabulator.unit_price}</td>
                        <td>${cost_tabulator.bulk_price}</td>
                        <td>${cost_tabulator.description}</td>
                        <td>${updatedAt}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editCost_tabulator(${cost_tabulator.idcost_tabulators})"><i class="bi bi-pencil-fill"></i></button>
                            <button class="btn btn-danger" onclick="deleteCost_tabulator(${cost_tabulator.idcost_tabulators})"><i class="bi bi-backspace-fill"></i></button>
                        </td>
                    </tr>
                `);
            });
        }
     



        function editCost_tabulator(id) {
    let cost_tabulator = cost_tabulators.find(item => item.idcost_tabulators === id);
    if (cost_tabulator) {
        $('#idcost_tabulators').val(cost_tabulator.idcost_tabulators);
        $('#iddestinations').val(cost_tabulator.destinations_iddestinations); 
        $('#unit_price').val(cost_tabulator.unit_price);
        $('#bulk_price').val(cost_tabulator.bulk_price);
        $('#description').val(cost_tabulator.description);
        $('#costTabulatorModal').modal('show');
    }
}

        function deleteCost_Tabulator(id) {
            if (confirm('¿Estás seguro de eliminar?')) {
                $.ajax({
                    url: `/cost_tabulators/delete/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        fetchCost_Tabulators();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        alert('Error al eliminar el registro. Intenta de nuevo.');
                    }
                });
            }
        }

        function clearForm() {
            $('#costTabulatorForm')[0].reset();
            $('#idcost_tabulators').val('');
        }

        document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-btn');
    const table = document.querySelector('table tbody');

    searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)'); 
            if (nameCell) {
                const nameText = nameCell.textContent.toLowerCase();
                if (nameText.includes(searchTerm)) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            }
        });
    });

    searchInput.addEventListener('input', function() {
        searchButton.click();
    });
});
    </script>
</body>
</html>
