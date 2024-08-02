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

            <div class="col-md-10">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Unidades</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitModal" onclick="clearForm()">
                        Añadir Unidad
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>
                
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Placas</th>
                            <th>Espacio</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualizacion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="unitTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unitModal" tabindex="-1" aria-labelledby="unitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="unitForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="unitModalLabel">Añadir/Editar Cliente</h5>
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
    var units = [];

    $(document).ready(function () {
    fetchUnits();

    $('#sort-asc').on('click', function () {
        fetchUnits('asc');
    });
    $('#sort-desc').on('click', function () {
        fetchUnits('desc');
    });

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

    $('#search-btn').on('click', function () {
        applyFilters();
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
                <td>
                    <button class="btn btn-warning" onclick="editUnit(${unit.idunits})"><i class="bi bi-pencil-fill"></i></button> <!-- Cambiar a unit.idunits -->
                    <button class="btn btn-danger" onclick="deleteUnit(${unit.idunits})"><i class="bi bi-backspace-fill"></i></button> <!-- Cambiar a unit.idunits -->
                </td>
            </tr>
        `);
    });
}

    function applyFilters() {
        let searchValue = $('#search-input').val().toLowerCase();
        
        let filteredUnits = units.filter(function (unit) {
            let match = true;

            if (searchValue) {
                match = unit.model.toLowerCase().includes(searchValue) || unit.manufacturer.toLowerCase().includes(searchValue);
            }

            return match;
        });

        renderUnits(filteredUnits);
    }

    function editUnit(id) {
    $.get(`/get/unit/${id}`, function (unit) {
        $('#idunits').val(unit.idunits); // Asegúrate de usar 'idunits'
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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'DELETE',
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
    </script>
</body>
</html>
