<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Agrega tus estilos personalizados aquí */
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button type="button" class="btn btn-danger ml-auto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
</nav>

<div class="container mt-4">
    <h1>Gestión de Usuarios</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" onclick="clearForm()">Añadir Usuario</button>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Correo Electrónico</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            <!-- Las filas de usuarios se agregarán aquí dinámicamente -->
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="userForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Añadir/Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user-id" name="user_id">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rol:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        fetchUsers();

        $('#userForm').on('submit', function(event) {
            event.preventDefault();
            const userId = $('#user-id').val();
            const url = userId ? `/users/${userId}` : '/users';
            const method = userId ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(),
                success: function(response) {
                    $('#userModal').modal('hide');
                    fetchUsers();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.edit-btn', function() {
            const userId = $(this).data('id');
            $.get(`/users/${userId}`, function(user) {
                $('#user-id').val(user.id);
                $('#name').val(user.name);
                $('#email').val(user.email);
                $('#role').val(user.role);
                $('#userModal').modal('show');
            });
        });

        $(document).on('click', '.delete-btn', function() {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                const userId = $(this).data('id');
                $.ajax({
                    url: `/users/${userId}`,
                    method: 'DELETE',
                    success: function() {
                        fetchUsers();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        function fetchUsers() {
            $.get('/users', function(users) {
                $('#userTableBody').empty();
                users.forEach(user => {
                    $('#userTableBody').append(`
                        <tr>
                            <td>${user.name}</td>
                            <td>${user.role}</td>
                            <td>${user.email}</td>
                            <td>${user.created_at}</td>
                            <td>${user.updated_at}</td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="${user.id}">Editar</button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${user.id}">Eliminar</button>
                            </td>
                        </tr>
                    `);
                });
            });
        }

        window.clearForm = function() {
            $('#user-id').val('');
            $('#userForm')[0].reset();
            $('#userModalLabel').text('Añadir Usuario');
        };
    });
</script>
</body>
</html>
