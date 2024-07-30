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
                <h1 class="h2">Estados</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stateModal" onclick="clearForm()">
                        Añadir Estado
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>
                
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>País</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualizacion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="stateTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stateModal" tabindex="-1" aria-labelledby="stateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="stateForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="stateModalLabel">Añadir/Editar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idstates" name="id">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">País</label>
                            <input type="text" class="form-control" id="country" name="country" required>
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
 var states = [];

$(document).ready(function () {
    fetchStates();

    $('#sort-asc').on('click', function () {
        fetchStates('asc');
    });

    $('#sort-desc').on('click', function () {
        fetchStates('desc');
    });

    $('#stateForm').on('submit', function (e) {
        e.preventDefault();

        let id = $('#idstates').val();
        let url = id ? `/update/state/${id}` : '/insert/state';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: $('#stateForm').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#stateModal').modal('hide');
                fetchStates();
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

function fetchStates(order = 'asc') {
    $.get(`/get/states?order=${order}`, function (data) {
        states = data;
        renderStates(states);
    });
}

function renderStates(data) {
    let tableBody = $('#stateTableBody');
    tableBody.empty();
    data.forEach(state => {
        let createdAt = new Date(state.created_at).toLocaleString();
        let updatedAt = new Date(state.updated_at).toLocaleString();
        tableBody.append(`
            <tr>
                <td>${state.idstates}</td> 
                <td>${state.name}</td>
                <td>${state.country}</td>
                <td>${createdAt}</td>
                <td>${updatedAt}</td>
                <td>
                    <button class="btn btn-warning" onclick="editState(${state.idstates})"><i class="bi bi-pencil-fill"></i></button> 
                    <button class="btn btn-danger" onclick="deleteState(${state.idstates})"><i class="bi bi-backspace-fill"></i></button> 
                </td>
            </tr>
        `);
    });
}

function applyFilters() {
    let searchValue = $('#search-input').val().toLowerCase();
    let filteredStates = states.filter(state => state.name.toLowerCase().includes(searchValue));
    renderStates(filteredStates);
}

function editState(id) {
    $.get(`/get/state/${id}`, function (state) {
        $('#idstates').val(state.idstates);
        $('#name').val(state.name);
        $('#country').val(state.country);
        $('#stateModal').modal('show');
    });
}

function deleteState(id) {
    $.ajax({
        url: `/delete/state/${id}`,
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            fetchStates();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function clearForm() {
    $('#idstates').val('');
    $('#stateForm')[0].reset();
}

</script>
</body>
</html>
