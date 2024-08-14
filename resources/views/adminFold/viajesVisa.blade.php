<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Viaje</title>
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
        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        .export-btn {
            margin-top: 20px;
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
            <h2 class="mt-5">Lista de Viajes Registrados</h2>
            <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Registrar Nuevo Viaje</button>
            <div class="table-responsive mt-4">
                <table class="table table-striped" id="travelTable">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Destino</th>
                            <th>Unidad</th>
                            <th>Fecha</th>
                            <th>Acompañantes</th>
                            <th>Total Personas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="travelList">
                        <!-- Aquí se mostrarán los viajes registrados -->
                    </tbody>
                </table>
            </div>
            <button class="btn btn-success export-btn" onclick="exportTableToExcel('travelTable', 'viajes')">Exportar a Excel</button>
        </div>
    </div>
</div>

<!-- Modal para registrar un nuevo viaje -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrar Nuevo Viaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="travelForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destination">Seleccionar Destino</label>
                        <select class="form-control" id="destination" name="destination" required>
                            <option value="">Seleccionar Destino</option>
                            @foreach($destinations as $destination)
                            <option value="{{ $destination->iddestinations }}">{{ $destination->destination_acronym }} - {{ $destination->city->name }}, {{ $destination->state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Seleccionar Unidad</label>
                        <select class="form-control" id="unit" name="unit" required>
                            <option value="">Seleccionar Unidad</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->idunits }}" data-max="{{ $unit->place }}">{{ $unit->model }} - {{ $unit->manufacturer }} ({{ $unit->place }} asientos)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="travelDate">Fecha del Viaje</label>
                        <input type="date" class="form-control" id="travelDate" name="travelDate" required>
                    </div>
                    <div class="form-group">
                        <label for="client">Seleccionar Cliente</label>
                        <select class="form-control" id="client" name="client" required>
                            <option value="">Seleccionar Cliente</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }} {{ $client->last_name }} - {{ $client->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <h4>Acompañantes (Opcional)</h4>
                    <div id="companionsContainer">
                        <div class="form-group">
                            <label for="companionName">Nombre del Acompañante</label>
                            <input type="text" class="form-control" id="companionName" name="companions[]">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addCompanion">Agregar Acompañante</button>
                    <div class="error-message" id="errorMessage"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar Cliente y Acompañantes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    let maxPeople = 0;
    let totalPeople = 1;

    $(document).ready(function() {
        $('#unit').change(function() {
            const selectedOption = $(this).find('option:selected');
            maxPeople = parseInt(selectedOption.data('max'));
            totalPeople = 1;
            $('#companionsContainer').html(`
                <div class="form-group">
                    <label for="companionName">Nombre del Acompañante</label>
                    <input type="text" class="form-control" id="companionName" name="companions[]">
                </div>
            `);
            $('#errorMessage').text('');
        });

        $('#addCompanion').click(function() {
            if (totalPeople < maxPeople) {
                $('#companionsContainer').append(`
                    <div class="form-group">
                        <label for="companionName">Nombre del Acompañante</label>
                        <input type="text" class="form-control" name="companions[]">
                    </div>
                `);
                totalPeople++;
                $('#errorMessage').text('');
            } else {
                $('#errorMessage').text('Se ha alcanzado el número máximo de personas para esta unidad.');
            }
        });

        $('#travelForm').submit(function(e) {
            e.preventDefault();
            let client = $('#client option:selected').text();
            let destination = $('#destination option:selected').text();
            let travelDate = $('#travelDate').val();
            let unit = $('#unit option:selected').text();
            let companions = $('input[name="companions[]"]').map(function() {
                return $(this).val();
            }).get();

            let totalCompanions = companions.filter(c => c !== "").length; // Filtrar valores vacíos
            let totalPeopleInTravel = totalCompanions + 1;

            $('#travelList').append(`
                <tr>
                    <td>${client}</td>
                    <td>${destination}</td>
                    <td>${unit}</td>
                    <td>${travelDate}</td>
                    <td>${companions.filter(c => c !== "").join(', ')}</td>
                    <td>${totalPeopleInTravel}</td>
                    <td>
                        <button class="btn btn-warning btn-edit">Editar</button>
                        <button class="btn btn-danger btn-delete">Eliminar</button>
                    </td>
                </tr>
            `);

            $('#registerModal').modal('hide');
            $('#travelForm')[0].reset();
            $('#companionsContainer').html(`
                <div class="form-group">
                    <label for="companionName">Nombre del Acompañante</label>
                    <input type="text" class="form-control" id="companionName" name="companions[]">
                </div>
            `);
            totalPeople = 1;
            $('#errorMessage').text('');
        });

        $(document).on('click', '.btn-delete', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('click', '.btn-edit', function() {
            let row = $(this).closest('tr');
            $('#client').val(row.find('td:eq(0)').data('id')).change();
            $('#destination').val(row.find('td:eq(1)').data('iddestinations')).change();
            $('#unit').val(row.find('td:eq(2)').data('idunits')).change();
            $('#travelDate').val(row.find('td:eq(3)').text());

            let companions = row.find('td:eq(4)').text().split(', ');
            totalPeople = companions.length + 1;

            $('#companionsContainer').html('');
            companions.forEach(function(companion) {
                $('#companionsContainer').append(`
                    <div class="form-group">
                        <label for="companionName">Nombre del Acompañante</label>
                        <input type="text" class="form-control" name="companions[]" value="${companion}">
                    </div>
                `);
            });

            row.remove();
            $('#registerModal').modal('show');
        });
    });

    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        
        filename = filename ? filename + '.xls' : 'excel_data.xls';
        
        downloadLink = document.createElement("a");
        
        document.body.appendChild(downloadLink);
        
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            downloadLink.download = filename;
            downloadLink.click();
        }
    }
</script>
</body>
</html>
