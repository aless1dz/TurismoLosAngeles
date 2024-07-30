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
                            <a class="nav-link" href="#">
                                Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                VISA
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Acompañantes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-md-10">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <h1 class="h2">Clientes</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" onclick="clearForm()">
                        Añadir Cliente
                    </button>
                    <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                    <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                </div>
                
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Fecha Nacimiento</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="userForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Añadir/Editar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="id">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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
    var users = [];

    $(document).ready(function () {
        fetchUsers();

        $('#sort-asc').on('click', function () {
            fetchUsers('id', 'asc');
        });
        $('#sort-desc').on('click', function () {
            fetchUsers('id', 'desc');
        });

        $('#userForm').on('submit', function (e) {
            e.preventDefault();

            let id = $('#user_id').val();
            let url = id ? `/update/user/${id}` : '/insert/user';
            let method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: $('#userForm').serialize(),
                success: function (response) {
                    $('#userModal').modal('hide');
                    fetchUsers();
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

    function fetchUsers(order = 'asc') {
        $.get(`/get/users?order=${order}`, function (data) {
            users = data;
            renderUsers(users);
        });
    }

    function renderUsers(data) {
        let tableBody = $('#userTableBody');
        tableBody.empty();
        data.forEach(user => {
            tableBody.append(`
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.last_name}</td>
                    <td>${user.email}</td>
                    <td>${user.birthdate}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editUser(${user.id})"><i class="bi bi-pencil-fill"></i></button>
                        <button class="btn btn-danger" onclick="deleteUser(${user.id})"><i class="bi bi-backspace-fill"></i></button>
                    </td>
                </tr>
            `);
        });
    }

    function applyFilters() {
        let searchValue = $('#search-input').val().toLowerCase();
        
        let filteredUsers = users.filter(function (user) {
            let match = true;

            if (searchValue) {
                match = user.name.toLowerCase().includes(searchValue) || user.last_name.toLowerCase().includes(searchValue);
            }

            return match;
        });

        renderUsers(filteredUsers);
    }

    function editUser(id) {
        $.get(`/get/user/${id}`, function (user) {
            $('#user_id').val(user.id);
            $('#nombre').val(user.name);
            $('#apellidos').val(user.last_name);
            $('#email').val(user.email);
            $('#birthdate').val(user.birthdate);
            $('#userModal').modal('show');
        });
    }

    function deleteUser(id) {
        $.ajax({
            url: `/delete/user/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'DELETE',
            success: function () {
                fetchUsers();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function clearForm() {
        $('#user_id').val('');
        $('#userForm')[0].reset();
    }
    </script>
</body>
</html>
