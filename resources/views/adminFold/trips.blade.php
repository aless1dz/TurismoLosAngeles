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
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Ciudades</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cityModal" onclick="clearForm()">
                        Añadir Ciudad
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>
                
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualizacion</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="cityTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="cityForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="cityModalLabel">Añadir/Editar Ciudad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idcities" name="id">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="idstates">Estado</label>
                        <select class="form-control" id="idstates" name="idstates" required>
                            
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
var cities = [];
var states = [];

$(document).ready(function () {
    fetchCities();
    fetchStates();

    $('#cityForm').on('submit', function (e) {
        e.preventDefault();

        let id = $('#idcities').val();
        let url = id ? `/update/city/${id}` : '/insert/city';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: $('#cityForm').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#cityModal').modal('hide');
                fetchCities();
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

function fetchCities(order = 'asc') {
    $.get(`/get/cities?order=${order}`, function (data) {
        cities = data;
        renderCities(cities);
    });
}

function renderCities(data) {
    let tableBody = $('#cityTableBody');
    tableBody.empty();
    data.forEach(city => {
        let createdAt = new Date(city.created_at).toLocaleString();
        let updatedAt = new Date(city.updated_at).toLocaleString();
        tableBody.append(`
            <tr>
                <td>${city.idcities}</td>
                <td>${city.name}</td>
                <td>${city.state ? city.state.name : 'N/A'}</td>
                <td>${createdAt}</td>
                <td>${updatedAt}</td>
                <td>
                    <button class="btn btn-warning" onclick="editCity(${city.idcities})"><i class="bi bi-pencil-fill"></i></button>
                    <button class="btn btn-danger" onclick="deleteCity(${city.idcities})"><i class="bi bi-backspace-fill"></i></button>
                </td>
            </tr>
        `);
    });
}

function applyFilters() {
    let searchValue = $('#search-input').val().toLowerCase();
    
    let filteredCities = cities.filter(function (city) {
        let match = true;

        if (searchValue) {
            match = city.name.toLowerCase().includes(searchValue);
        }

        return match;
    });

    renderCities(filteredCities);
}

function fetchStates() {
    $.get('/get/states', function (data) {
        states = data;
        let stateSelect = $('#idstates');
        stateSelect.empty();
        states.forEach(state => {
            stateSelect.append(`<option value="${state.idstates}">${state.name}</option>`);
        });
    });
}

function editCity(id) {
    $.get(`/get/city/${id}`, function (city) {
        $('#idcities').val(city.idcities);
        $('#name').val(city.name);
        $('#idstates').val(city.states_idstates);
        $('#cityModal').modal('show');
    });
}

function deleteCity(id) {
    $.ajax({
        url: `/delete/city/${id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'DELETE',
        success: function () {
            fetchCities();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function clearForm() {
    $('#idcities').val('');
    $('#cityForm')[0].reset();
    $('#idstates').val('');
}
</script>
</body>
</html>
