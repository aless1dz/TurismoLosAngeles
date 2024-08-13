<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                <i class="bi bi-person-hearts"></i> Acompañantes
                            </a>
                        </li> -->
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('cost_tabulators') }}">
                                <i class="bi bi-currency-dollar"></i> Tabla de Costos
                            </a>
                        </li> -->
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

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Unidades</h1>
                </div>
                
                <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitModal" onclick="clearForm()">
                        <i class="bi bi-plus-lg"></i> Añadir Unidad
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
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Placas</th>
                                <th>Espacio</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Estado</th>
                                <th>Editar/Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="unitTableBody">
                            @foreach($units as $unit)
                                <tr>
                                    <td>{{ $unit->idunits }}</td>
                                    <td>{{ $unit->model }}</td>
                                    <td>{{ $unit->manufacturer }}</td>
                                    <td>{{ $unit->plate }}</td>
                                    <td>{{ $unit->place }}</td>
                                    <td>{{ $unit->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $unit->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ ucfirst($unit->state_form) }}</td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editUnitModal-{{ $unit->idunits }}"><i class="bi bi-pencil-square"></i> Editar</button>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#editStatusModal-{{ $unit->idunits }}"><i class="bi bi-pencil-fill"></i> Editar Estado</button>
                                        <button class="btn btn-danger" onclick="deleteUnit({{ $unit->idunits }})"><i class="bi bi-backspace-fill"></i> Eliminar</button>
                                    </td>
                                </tr>

                                <!-- Modal para editar toda la unidad -->
                                <div class="modal fade" id="editUnitModal-{{ $unit->idunits }}" tabindex="-1" role="dialog" aria-labelledby="editUnitModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUnitModalLabel">Editar Unidad</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editUnitForm-{{ $unit->idunits }}" action="{{ route('updateUnit', $unit->idunits) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="model">Modelo</label>
                                                        <input type="text" class="form-control" name="model" value="{{ $unit->model }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturer">Marca</label>
                                                        <input type="text" class="form-control" name="manufacturer" value="{{ $unit->manufacturer }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="plate">Placas</label>
                                                        <input type="text" class="form-control" name="plate" value="{{ $unit->plate }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="place">Espacio</label>
                                                        <input type="number" class="form-control" name="place" value="{{ $unit->place }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para editar estado -->
                                <div class="modal fade" id="editStatusModal-{{ $unit->idunits }}" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editStatusModalLabel">Editar Estado de Unidad</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('updateUnitStatus', $unit->idunits) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="state_form">Estado</label>
                                                        <select name="state_form" id="state_form" class="form-control">
                                                            <option value="disponible" {{ $unit->state_form == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                                            <option value="en viaje" {{ $unit->state_form == 'en viaje' ? 'selected' : '' }}>En Viaje</option>
                                                            <option value="en renta" {{ $unit->state_form == 'en renta' ? 'selected' : '' }}>En Renta</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <div class="modal fade" id="unitModal" tabindex="-1" aria-labelledby="unitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="unitForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="unitModalLabel">Añadir/Editar Unidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idunits" name="idunits">
                        <div class="form-group">
                            <label for="model">Modelo</label>
                            <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Marca</label>
                            <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                        </div>
                        <div class="form-group">
                            <label for="plate">Placas</label>
                            <input type="text" class="form-control" id="plate" name="plate" required>
                        </div>
                        <div class="form-group">
                            <label for="place">Espacio</label>
                            <input type="number" class="form-control" id="place" name="place" required>
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
        var units = [];

        $(document).ready(function () {
            fetchUnits();

            $('#unitForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#idunits').val();
                let url = id ? `/units/update/${id}` : '/units/insert';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: $('#unitForm').serialize(),
                    success: function (response) {
                        $('#unitModal').modal('hide');
                        fetchUnits();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

        });

        function fetchUnits(order = 'asc') {
            $.get(`/get/units?order=${order}`, function (data) {
                units = data;
                renderUnits(units);
            });
        }

        function renderUnits(data) {
            let tableBody = $('#unitTableBody');
            tableBody.empty();
            data.forEach(unit => {
                let createdAt = new Date(unit.created_at).toLocaleString();
                let updatedAt = new Date(unit.updated_at).toLocaleString();
                tableBody.append(`
                    <tr>
                        <td>${unit.idunits}</td>
                        <td>${unit.model}</td>
                        <td>${unit.manufacturer}</td>
                        <td>${unit.plate}</td>
                        <td>${unit.place}</td>
                        <td>${createdAt}</td>
                        <td>${updatedAt}</td>
                        <td>${unit.state_form}</td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editUnitModal-${unit.idunits}"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button class="btn btn-info" data-toggle="modal" data-target="#editStatusModal-${unit.idunits}"><i class="bi bi-pencil-fill"></i> Editar Estado</button>
                            <button class="btn btn-danger" onclick="deleteUnit(${unit.idunits})"><i class="bi bi-backspace-fill"></i> Eliminar</button>
                        </td>
                    </tr>
                `);
            });
        }

        function applyFilters() {
            let searchValue = $('#search-input').val().toLowerCase();
            let filteredUnits = units.filter(unit => unit.model.toLowerCase().includes(searchValue) || unit.manufacturer.toLowerCase().includes(searchValue));
            renderUnits(filteredUnits);
        }

        function editUnit(id) {
            $.get(`/get/unit/${id}`, function (unit) {
                $('#idunits').val(unit.idunits);
                $('#model').val(unit.model);
                $('#manufacturer').val(unit.manufacturer);
                $('#plate').val(unit.plate);
                $('#place').val(unit.place);
                $('#unitModal').modal('show');
            });
        }

        function deleteUnit(id) {
            $.ajax({
                url: `/delete/unit/${id}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    fetchUnits();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function clearForm() {
            $('#idunits').val('');
            $('#unitForm')[0].reset();
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
